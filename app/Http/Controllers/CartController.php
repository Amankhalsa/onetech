<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //add_To_cart
    public function add_To_cart($id){

        $product = DB::table('products')->where('id',$id)->first();

            $data = array();
             
 if ($product->discount_price == NULL) {
            $data['id'] =  $product->id;
            $data['name' ] =  $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
             return response()->json(['success' => 'Successfully Added on your Cart']);   
         }
        else {
            $data['id'] =  $product->id;
            $data['name' ] =  $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json(['success' => 'Successfully Added on your Cart']);  

        }

    }

    
    public function check(){
    	$content = Cart::content();
        // dd($content);
    	return response()->json($content);
    }

}
