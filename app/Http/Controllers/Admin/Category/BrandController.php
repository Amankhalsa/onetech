<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\fileExists;

class BrandController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    // adminViewbrand
    public function adminViewbrand(){
       $viewbrands = Brand::all();

       return view('admin.brand.view_brand',compact('viewbrands'));

    }
    // adminStoreBrand
    public function adminStoreBrand(Request $request ){
        $validateData = $request->validate([

            'brand_name' => 'required|unique:brands|max:255',

        ]);

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');
            if($image){
                $image_name = date('day_H_s_i');
                $ext=  strtolower( $image->getClientOriginalExtension());
                $imageFullname =    $image_name.'.'.$ext;
                $upload_path ='media/brands/';
                $image_url= $image->move($upload_path, $imageFullname);
               
                $data['brand_logo'] = $image_url;
                DB::table('brands')->insert($data);
                $notification = array(
                    'message' => 'brand Inserted  successfully',
                    'alert-type' => 'success'
                                    );
                return redirect()->back()->with($notification); 

            }else {
                DB::table('brands')->insert($data);
                $notification = array(
                    'message' => 'brand name  successfully',
                    'alert-type' => 'info'
                );
                    return redirect()->back()->with($notification); 
            }
    }
    // adminDeleteBrand
    public function adminDeleteBrand($id){
        $oldImage =  Brand::find($id)->first();
            $getImage = $oldImage->brand_logo;
            if(fileExists($getImage)){

                unlink( $getImage);
            }
        $deletebrand =  Brand::find($id);

        $deletebrand->delete();
        $notification = array(
            'message' => 'brand Deleted  successfully',
            'alert-type' => 'error'
        );
            return redirect()->back()->with($notification); 
    }
    // adminEditBrand
    public function adminEditBrand($id){
        $editebrand =  Brand::find($id);

       return view('admin.brand.edit_brand',compact('editebrand'));

    }
    // adminUpdateBrand
    public function adminUpdateBrand(Request $request, $id){
            $update =  Brand::find($id);
        

            $image = $request->file('brand_logo');
            if($image){
                $oldImage =  Brand::find($id);
                $getImage = $oldImage->brand_logo;
                $image_name = date('day_H_s_i');
                $ext=  strtolower( $image->getClientOriginalExtension());
                $imageFullname =    $image_name.'.'.$ext;
                $upload_path ='media/brands/';
                $image_url= $image->move($upload_path, $imageFullname);
                $update->brand_logo = $image_url;
                $update->save();
                if(fileExists($getImage)){
                    unlink( $getImage);
                }
                $notification = array(
                    'message' => 'brand Image Updated  successfully',
                    'alert-type' => 'success'
                                    );
                return redirect()->route('admin.viewbrands')->with($notification); 


            }else {
                $update->brand_name =  $request->brand_name;
                $update->save();
                $notification = array(
                    'message' => 'brand name Updated  successfully',
                    'alert-type' => 'info'
                );
                    return redirect()->route('admin.viewbrands')->with($notification); 
                 }   
        }
}