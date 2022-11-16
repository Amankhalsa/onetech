<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function NewOrder(){
        $order = DB::table('orders')->where('status',0)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function adminViewOrder($id){
        $vieworder = DB::table('orders')
                    ->join('users','orders.user_id','users.id') 	
                    ->select('orders.*','users.name','users.phone')
                    ->where('orders.id',$id)
                    ->first();


        $shipping  = DB::table('shippings')->where('order_id',$id)->first();
        // dd($shipping);
        $order_detail = DB::table('order_details')
                        ->join('products', 'order_details.product_id','products.id')
                        ->select('order_details.*','products.product_code','products.image_one')
                        ->where('order_details.order_id',$id)
                        ->get();
        dd($order_detail);
        return view('admin.order.view_order',compact('vieworder','shipping','order_detail'));


    }
}
