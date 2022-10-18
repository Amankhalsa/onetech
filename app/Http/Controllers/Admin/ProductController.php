<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
Use Image ;
class ProductController extends Controller
{
    //
        
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    // ViewProduct
    public function ViewProduct(){
        $products = DB::table('products')
                    ->join('categories','products.category_id', 'categories.id')
                    ->join('brands','products.brand_id', 'brands.id')
                    ->select('products.*','categories.category_name','brands.brand_name')
                    ->get();
                //   return response()->json($products);  

        return view('admin.product.showProduct',compact('products'));

    }
    // createProduct
    public function createProduct(){
            $category =  Category::all();
            $brand =  Brand::all();
        return view('admin.product.createProduct' ,compact('category','brand'));

    }
    // GetSubcat
    public function GetSubcat($category_id){
                $subcar = Subcategory::where('category_id' ,$category_id)->get();
                return json_decode( $subcar );
    }
    // storeProduct
    public function storeProduct(Request $request ){
        $data = array();
        $data['product_name'] = strtoupper(preg_replace("/[\s-]+/", " ",  $request->product_name));
        $genName=   substr($request->product_name, 0, 3);
        $data['product_code'] = strtoupper(preg_replace("/[\s-]+/", " ", $genName)).rand(0000,9999);;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['status'] = 1;
        $data['created_at'] = Carbon::now();

    
        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
    
        // return response()->json($data); 
        if($image_one && $image_two && $image_three){

            $image_name_one = hexdec(uniqid());
            $ext1=  strtolower( $image_one->getClientOriginalExtension());
            $imageFullname1 =    $image_name_one.'.'.$ext1;
            $upload_path ='media/products/';
            Image::make($image_one)->resize(300,300)->save( $upload_path. $imageFullname1 );
            $data['image_one']  =  $upload_path. $imageFullname1;

            $image_name_two = hexdec(uniqid());
            $ext2=  strtolower( $image_two->getClientOriginalExtension());
            $imageFullname2 =    $image_name_two.'.'.$ext2;
            $upload_path ='media/products/';
            Image::make($image_two)->resize(300,300)->save( $upload_path. $imageFullname2 );
            $data['image_two']  =  $upload_path. $imageFullname2;


            $image_name_three =hexdec(uniqid());
            $ext3=  strtolower( $image_three->getClientOriginalExtension());
            $imageFullname3 =    $image_name_three.'.'.$ext3;
            $upload_path ='media/products/';
            Image::make($image_three)->resize(300,300)->save( $upload_path. $imageFullname3 );
            $data['image_three']  =  $upload_path. $imageFullname3;

            DB::table('products')->Insert($data);
            $notification = array(
                'message' => 'Product Inserted  successfully',
                'alert-type' => 'success'
                            );
            return redirect()->route('all_Product')->with($notification); 
        }
    }
}
