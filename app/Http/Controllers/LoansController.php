<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Loans;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as pdf;

class LoansController extends Controller
{
    public function index()
    {
        $loans = Loans::where("user_id", auth()->user()->id)->latest()->get();
        return view("content.user.showloans", [
            "loans" => $loans
        ]);
    }

    public function create()
    {
        $loans = Loans::with('user');
        $q = DB::table('loans')->select(DB::raw('MAX(RIGHT(loans_code,4)) as code'));
        $kd = "";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->code)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return view('content.user.create',[
            'title' => 'Catat Peminjaman',
            'goods' => Goods::all(),
        ], compact('loans', 'kd'));
    }

    public function store(Request $request)
    {
        $loan_limit = Loans::where("user_id", auth()->user()->id)->where('acceptance_status', '!=' , 0)->where('acceptance_status', '!=' , 2)->orWhereNull('acceptance_status')->get()->count();
        $target_goods_stock = Goods::where("id", $request->goods_id)->get();

        if($target_goods_stock[0]->stock === 0) {
            return redirect("/create")->with("failed", "This item is out of stock !");
        }


        if($loan_limit < 100) {
            $validatedData = $request->validate([
                "loans_code" =>"required",
                "goods_id" => "required",
                "purpose" => "required"
            ]);
    
            $validatedData["user_id"] = auth()->user()->id;
            
            Loans::create($validatedData);
    
            return redirect("/loans")->with("success", "Loan request was sent, pls wait admin to accept your request !");
        }

        return redirect("create")->with("failed", "You can only borrow 4 item in one period !");
    }

    public function delete(Loans $loans){

         Loans::destroy($loans->id);
        
         return redirect('/loans')->with('success', 'A Request Was Cancelled');
     }

    public function return(Loans $loans) {

         Loans::where("id", $loans->id)->update(["acceptance_status" => 2]);
        
         $target_goods = Goods::where("id", $loans->goods_id)->get();
         Goods::where("id", $loans->goods_id)->update(["stock" => $target_goods[0]->stock += 1]);
                
        return redirect("loans")->with("success", "Item Return Succcesfully !");
     }
     
     public function downloadpdf() {
        $loans = Loans::all();
 
    	$pdf = PDF::loadview('content.user.downloadpdfloans',['loans'=> $loans])->setOptions(['defaultFont' => 'sans-serif']);;
    	return $pdf->download('report-loans.pdf');
        return redirect('content.user.showloans');
     }
}
