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
public function showcart(){

    $showcontent = Cart::content();
    // dd($content);
    // return response()->json($showcontent);
    return view('frontend.cartpage',compact('showcontent'));

}

public function  removecart($rowId){
    // return response()->json($showcontent);
    Cart::remove($rowId);
    $notification = array(
        'message' => 'Cart removed Successfully  ',
        'alert-type' => 'info'
    );
    return redirect()->back()->with($notification);
}

public function updateCart(Request $request){
    // dd($request->productid);
    $rowId = $request->productid;
    $qty = $request->qty;
    Cart::update($rowId,$qty);
    $notification = array(
        'message' => 'Cart updated Successfully  ',
        'alert-type' => 'info'
    );
 return Redirect()->back()->with($notification);
}
public function viewproduct($id){
    $product = DB::table('products')
    ->join('categories','products.category_id', 'categories.id')
    ->join('subcategories','products.subcategory_id','subcategories.id' )
    ->join('brands','products.brand_id', 'brands.id')
    ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
    ->where('products.id' , $id)->first();
    // return response()->json($product);
    
$color = $product->product_color;
$product_color = explode(',', $color) ?? 'red';

$size = $product->product_size;
$product_size = explode(',', $size)  ?? '5';	
return response()->json(array(
    'product' =>  $product,
    'color' =>  $product_color,
    'size' =>  $product_size,

));
}

public function insertintocart(Request $request){
            $id =     $request->product_id;
            $product = DB::table('products')->where('id',$id)->first();

            $data = array();
             
 if ($product->discount_price == NULL) {
            $data['id'] =  $product->id;
            $data['name' ] =  $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('show.cart')->with($notification);
         }
        else {
            $data['id'] =  $product->id;
            $data['name' ] =  $product->product_name;
            $data['qty'] = $request->qty;

            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
     
               $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('show.cart')->with($notification);


        }
}

        public function userCheckOut(){
        if(Auth::check()){
            $showcontent = Cart::content();
            return view('frontend.checkout',compact('showcontent'));
        }
        else{
            $notification = array(
                'message' => 'At first Login Your Account',
                'alert-type' => 'error'
            );
            return Redirect()->route('login')->with($notification);
           
        }
}


    public function userwishlist(){
        $userid = Auth::id();
        $product = DB::table('wishlists')
        ->join('products', 'wishlists.product_id','products.id' )
        ->select('products.*' ,'wishlists.user_id')
        ->where('wishlists.user_id',$userid)
        ->get();
        // return response()->json( $product);
        return view('frontend.wishlist',compact('product'));
 
    }
    public function apply_coupon(Request $request ){
            $coupon =  $request->coupon;
            $check = DB::table('coupons')->where('coupon', $coupon)->first();
                if( $check ){
                   Session::put('coupon',[
                    'name' => $check->coupon,
                    'discount' => $check->discount,
                    
                    'balance' => str_replace(',', '', Cart::subtotal()) - $check->discount 
                   ]);
                   $notification = array(
                    'message' => 'Copon Apply success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
                }else 
                {
                    $notification = array(
                        'message' => 'Invalid Copon ',
                        'alert-type' => 'error'
                    );
                    return Redirect()->back()->with($notification);

                }
        }


        public function couponremove(){
            Session::forget('coupon');
            $notification = array(
                'message' => 'Coupon removed ',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }


        public function paymentpage(){
            $cart = Cart::content();
            return view('frontend.payment',compact('cart'));
        }

        public function prodcut_search(Request $request){
        $items = $request->search ;

     $products =  DB::table('products')
        ->where('product_name','LIKE',"%$items%")
        ->paginate(20);
        return view('frontend.search',compact('products'));

        }
}