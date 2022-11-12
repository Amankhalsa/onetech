<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function paymentProcess(Request $request ){
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;
         // dd($data);
     
         if ($request->payment == 'stripe') {
            echo "stripe  ";
        //  return view('pages.payment.stripe',compact('data'));
     
         }elseif ($request->payment == 'paypal') {
            echo "paypal payment method is  pending ";

             # code...
         }elseif ($request->payment == 'ideal') {

            echo "ideal payment method is  pending  ";

             # code...
         }else{
             echo "Cash On Delivery";
         }  
    }
}
