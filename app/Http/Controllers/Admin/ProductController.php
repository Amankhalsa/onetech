<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //
        
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    // ViewProduct
    public function ViewProduct(){
        return view('admin.product.showProduct');

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
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
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
    
        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
    
        return response()->json($data); 
    }
}
