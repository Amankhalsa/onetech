<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class ProductDetailController extends Controller
{
    //viewProductdetail
    public function viewProductdetail($id,$product_name){       

        $product = DB::table('products')
        ->join('categories','products.category_id', 'categories.id')
        ->join('subcategories','products.subcategory_id','subcategories.id' )
        ->join('brands','products.brand_id', 'brands.id')
        ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
        ->where('products.id' , $id)->first();




$color = $product->product_color;
$product_color = explode(',', $color) ?? 'red';

$size = $product->product_size;
$product_size = explode(',', $size)  ?? '5';		
                //   return response()->json($product);  

return view('frontend.product_detail',compact('product','product_color','product_size'));
    }


    public function addtoCartproduct(Request $request ,$id){
        $product = DB::table('products')->where('id',$id)->first();

            $data = array();
             
 if ($product->discount_price == NULL) {
            $data['id'] =  $product->id;
            $data['name' ] =  $product->product_name;
            $data['qty'] =  $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
             $notification = array(
                'message' => 'Successfully Added on your Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
         }
        else {
            $data['id'] =  $product->id;
            $data['name' ] =  $product->product_name;
            $data['qty'] =  $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification = array(
                'message' => 'Successfully Added on your Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
    }
    // showcart
    public function showcart(){
        
    }
    public function productsView($id){

        $products = DB::table('products')->where('subcategory_id',$id)->paginate(5);
        $categories = DB::table('categories')->get();
        $brands = DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();

        return view('frontend.allproducts',compact('products','categories','brands'));

    }

    public function all_categories_view($id){
        $all_categories = DB::table('products')->where('category_id',$id)->paginate(5);

        $brands = DB::table('products')->where('category_id',$id)->select('brand_id')->groupBy('brand_id')->get();

        $categories = DB::table('categories')->get();

        return view('frontend.allcategories',compact('all_categories','brands','categories'));


         
    }
}
