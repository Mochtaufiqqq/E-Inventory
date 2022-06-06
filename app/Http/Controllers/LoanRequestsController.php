<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Loans;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as pdf;

class LoanRequestsController extends Controller
{
    public function index() {

        return view("content.admin.loanrequests", [
            "loans" => Loans::latest()->get()
        ]);
    }

    public function accept(Loans $loans) {
        Loans::where("id", $loans->id)->update(["acceptance_status" => 1]);
        
        $target_goods = Goods::where("id", $loans->goods_id)->get();
        Goods::where("id", $loans->goods_id)->update(["stock" => $target_goods[0]->stock -= 1]);
        
        return redirect("/loanrequests")->with("success", "A request was accepted !");
    }

    public function reject(Loans $loans) {
        Loans::where("id", $loans->id)->update(["acceptance_status" => 0]);
        return redirect("/loanrequests")->with("warning", "A request was rejected !");
    }

    public function cancel(Loans $loans) {
        $loan_limit = Loans::where("user_id", $loans->user->id)->where('acceptance_status', '!=' , 0)->orWhereNull('acceptance_status')->get()->count();
        
        if($loans->acceptance_status === 0) {
            if($loan_limit < 3) {
                Loans::where("id", $loans->id)->update(["acceptance_status" => NULL]);
                return redirect("/loanrequests")->with("success", "A request was cancelled !");
            }
            return redirect("/loanrequests")->with("failed", "The user has selected another item !");
        }

        $target_goods = Goods::where("id", $loans->goods_id)->get();
        Goods::where("id", $loans->goods_id)->update(["stock" => $target_goods[0]->stock += 1]);

        Loans::where("id", $loans->id)->update(["acceptance_status" => NULL]);
        return redirect("/loanrequests")->with("warning", "A request was cancelled !");
    }

    public function done(Loans $loans) {
        Loans::where("id", $loans->id)->update(["acceptance_status" => 2]);

        $target_goods = Goods::where("id", $loans->goods_id)->get();
        Goods::where("id", $loans->goods_id)->update(["stock" => $target_goods[0]->stock += 1]);
        
        return redirect("loanrequests")->with("success", "A request was marked as done !");
    }

    public function loanactivity() {
        return view("content.admin.loanshow", [
            "loans" => Loans::latest()->get(),
        ]);
    }

    public function deleteloanactivity(Loans $loans) {

            Loans::destroy($loans->id);
    
            return redirect('/loanactivity')->with('success', 'Data Succesfully Deleted');
    }
    public function downloadpdf() {
        $loans = Loans::all();
 
    	$pdf = PDF::loadview('content.admin.pdfloans',['loans'=> $loans])->setOptions(['defaultFont' => 'sans-serif']);;
    	return $pdf->download('report-loans.pdf');
        return redirect('content.admin.loanshow');
     }
}

