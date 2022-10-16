<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function adminViewCategory(){
       $viewCategory = Category::all();
       return view('admin.category.view_category',compact('viewCategory'));
    }
    // adminStoreCategory
    public function adminStoreCategory(Request $request){
    
            $validated = $request->validate([
                'category_name' => 'required|unique:categories|max:255',
          
            ]);
        //    You can add data in two way 
                // $data = array();
                // $data['category_name'] =  $request->category_name;
                // DB::table('categories')->insert($data);
        // 2nd way to add 
        if( $validated){
            $storecat =new Category();
            $storecat->category_name =  $request->category_name;
            $storecat->save();
                $notification = array(
                    'message' => 'Category Inserted  successfully',
                    'alert-type' => 'success'
                );
            return redirect()->route('admin.viewCategory')->with($notification); 
              
        }
    }
    // adminDeleteCategory
    public function adminDeleteCategory($id){

        // DB::table('categories')->where('id',$id)->delete();
        $storecat = Category::find($id);
        $storecat->delete();

        $notification = array(
            'message' => 'Category Deleted  successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification); 
    }
    // adminEditCategory
    public function adminEditCategory($id){
        $editCategory =   DB::table('categories')->where('id',$id)->first();

       return view('admin.category.edit_category',compact('editCategory'));

    }
    // adminUpdateCategory
    public function adminUpdateCategory(Request $request ,$id){
        // 1st way 
        $data = array();
        $data['category_name'] =  $request->category_name;
        $update =   DB::table('categories')->where('id',$id)->update($data);

        // 2nd way 
        // $storecat = Category::find($id);
        // $storecat->category_name =  $request->category_name;
        // $storecat->save();
        if( $update ){

            $notification = array(
                'message' => 'Category Updated  successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('admin.viewCategory')->with($notification); 
        }
            
    }
}
