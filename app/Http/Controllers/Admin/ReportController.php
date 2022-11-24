<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function adminTodayOrder(){
        $today = date('d-m-y');
        // dd($date);
        $orders = DB::table('orders')->where('status',0)->where('date', $today )->get();
        // dd($orders);
        return view('admin.report.today_order',compact('orders'));
    }

    public function adminTodaydelivery(){
        $today = date('d-m-y');
        // dd($date);
        $orders = DB::table('orders')->where('status',3)->where('date', $today )->get();
        // dd($orders);
        return view('admin.report.today_delivery',compact('orders'));
    }

    public function adminthismonth(){

        $month = date('F');
        $orders = DB::table('orders')->where('status',3)->where('month',$month)->get();
        // dd($orders);
        return view('admin.report.this_month',compact('orders'));

    }

    public function adminSearchReport(){

        return view('admin.report.search_report');
    }

    public function searchByYearReport(Request $request ){
        $year = $request->year;
   
        // dd($date);
        $total = DB::table('orders')->where('status',3)->where('year',$year)->sum('total');

        $orders = DB::table('orders')->where('status',3)->where('year', $year )->get();
        // dd($orders);
        return view('admin.report.search_year',compact('orders','total'));
    }

    public function searchBymonthReport(Request $request){
        $month = $request->month;
   
        // dd($date);
        $total = DB::table('orders')->where('status',3)->where('month',$month)->sum('total');

        $orders = DB::table('orders')->where('status',3)->where('month', $month )->get();
        // dd($orders);
        return view('admin.report.search_month',compact('orders','total'));
    }


    public function SearchByDate( Request $request){
    	$date = $request->date;

 	$newdate = date('d-m-y',strtotime($date));
   
        // dd($date);
        $total = DB::table('orders')->where('status',3)->where('date',$newdate)->sum('total');

        $orders = DB::table('orders')->where('status',3)->where('date', $newdate )->get();
        // dd($orders);
        return view('admin.report.search_bydate',compact('orders','total'));
    }
}
