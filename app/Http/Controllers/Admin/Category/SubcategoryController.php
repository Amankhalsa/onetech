<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    //ViewSubCategory
    public function ViewSubCategory(){
        $category = DB::table('categories')->get();
        $subcat = DB::table('subcategories')
                    ->join('categories', 'subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category_name')
                    ->get();
    
        return view('admin.category.view_subcategory',compact('category','subcat'));

    }
    // adminStoreSubCategory
    public function adminStoreSubCategory(Request $request ){
            $validateData = $request->validate([
                'category_id' => 'required',
                'subcategory_name' => 'required|unique:subcategories|max:255',


            ]);
            $data = array();
            $data['category_id'] = $request->category_id;
            $data['subcategory_name'] = $request->subcategory_name;
            $data['created_at'] =Carbon::now();

            DB::table('subcategories')->insert($data );
            $notification = array(
                'message' => 'Sub Category Inserted  successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification); 
    }

    // editSubCategory
    public function editSubCategory($id){
        $category = DB::table('categories')->get();
        $editSubcat = DB::table('subcategories')->where('id', $id)->first();
        return view('admin.category.edit_subcategory',compact('editSubcat','category'));

    }   

    // updateSubCategory
    public function updateSubCategory(Request $request ,$id){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $data['updated_at'] =Carbon::now();
        DB::table('subcategories')->where('id', $id)->update($data );
        $notification = array(
            'message' => 'Sub Category updated  successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('viewSubCategory')->with($notification); 

    }
    // deleteSubCategory
    public function deleteSubCategory($id){
        DB::table('subcategories')->where('id', $id)->delete( );
        $notification = array(
            'message' => 'SubCategory Deleted  successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('viewSubCategory')->with($notification); 

    }
}
