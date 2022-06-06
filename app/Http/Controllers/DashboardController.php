<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Goods;
use App\Models\Loans;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
  
    public function dashboard () {
        $chart_options = [
            'chart_title' => 'Goods Statistic',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\goods',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
        $goods = DB::table('goods')->get();
        $totalloans = DB::table('loans')->get();
        $totalgoods = DB::table('goods')
        ->whereDate('created_at', '=', Carbon::today()->toDateString())
        ->get();

        return view('content.admin.index', [
            'totalgoods' => $totalgoods,
            'totalloans' => $totalloans,
            'goods'      => $goods
        ], compact('chart1'));
    }

   
    public function dashboarduser () {
        $loans = Loans::where("user_id", auth()->user()->id)->latest()->get();
        $goods = Goods::all();
        $totalloans = Loans::where("user_id", auth()->user()->id)->latest()->get();
        $totalgoods = DB::table('goods')->get();
        return view('content.user.index', [
            'totalgoods' => $totalgoods,
            'totalloans' => $totalloans,
            'goods'   => $goods,
        ], compact('loans'));
    }

}
