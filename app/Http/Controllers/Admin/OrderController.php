<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function NewOrder(){
        $order = DB::table('orders')->where('status', 0)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function adminViewOrder($id){
        $order = DB::table('orders')
                    ->join('users','orders.user_id','users.id') 	
                    ->select('orders.*','users.name','users.phone')
                    ->where('orders.id',$id)
                    ->first();


        $shipping  = DB::table('shippings')->where('order_id',$id)->first();
        // dd($shipping);
        $details = DB::table('order_details')
                        ->join('products', 'order_details.product_id','products.id')
                        ->select('order_details.*','products.product_code','products.image_one')
                        ->where('order_details.order_id',$id)
                        ->get();
        // dd($order_detail); 
        return view('admin.order.view_order',compact('order','shipping','details'));


    }
    public function adminpaymentaccept($id){
        DB::table('orders')->where('id', $id)->update(['status'=>1]);

        $notification = array(
            'message' => 'Payment Accept Done',
            'alert-type' => 'success'
        );
    return redirect()->route('admin.accept.payment')->with($notification);
    }

    public function adminpaymentcancel($id){
        DB::table('orders')->where('id', $id)->update(['status'=>4]);
        $notification = array(
            'message' => 'Order Cancel',
            'alert-type' => 'success'
        );
    return redirect()->route('admin.CancelOrder')->with($notification);
    }

    public function AcceptPayment(){
         $order = DB::table('orders')->where('status', 1)->get();
        //  dd($order);
        return view('admin.order.pending',compact('order'));

    }

    public function CancelOrder(){
        $order = DB::table('orders')->where('status',4)->get();
        // dd($order);
        return view('admin.order.pending',compact('order')); 
        }
      
      
          public function ProcessPayment(){
        $order = DB::table('orders')->where('status',2)->get();
        // dd($order);
        return view('admin.order.pending',compact('order')); 
        }
      
      
      
        public function SuccessPayment(){
        $order = DB::table('orders')->where('status',3)->get();
        // dd($order);
        return view('admin.order.pending',compact('order')); 
        }


        public function admindeleveryprocess($id){
            DB::table('orders')->where('id', $id)->update(['status'=>4]);
            $notification = array(
                'message' => 'Send To Delivery',
                'alert-type' => 'success'
            );
        return redirect()->route('admin.CancelOrder')->with($notification);
        }

        public function admindeleverydone($id){
            DB::table('orders')->where('id', $id)->update(['status'=>3]);
            $notification = array(
                'message' => 'Product Delivery Done',
                'alert-type' => 'success'
            );
        return redirect()->route('admin.SuccessPayment')->with($notification);
        }
      

        public function adminSeo(){

            $seo = DB::table('seos')->first();

            return view('admin.coupon.seo' , compact('seo'));
        }

        public function adminSeoUpdate(Request $request, $id){

            $data = array();
            $data['meta_title'] = $request->meta_title;
         $data['meta_author'] = $request->meta_author;
         $data['meta_tag'] = $request->meta_tag;
         $data['meta_description'] = $request->meta_description;
         $data['google_analytics'] = $request->google_analytics;
         $data['bing_analytics'] = $request->bing_analytics;
         DB::table('seos')->where('id',$id)->Update($data);
         $notification = array(
            'message' => 'Seo Updated',
            'alert-type' => 'success'
        );
                return Redirect()->back()->with($notification); 
        }
}
