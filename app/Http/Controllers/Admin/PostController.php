<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //blogCatList
    public function blogCatList(){
        $blogcat = DB::table('post_categories')->get();
        return view('admin.blog.category.index',compact('blogcat'));

    }
    // storeblogCat
    public function storeblogCat(Request $request ){
        $validate = $request->validate([
            'category_name_en' => 'required|unique:post_categories|max:255',
            'category_name_in' => 'required',

        ]);
                $data = array();
                $data['category_name_en'] = $request->category_name_en ;
                $data['category_name_in'] = $request->category_name_in ;
                DB::table('post_categories')->insert($data);

                $notification = array(
                    'message' => 'Category Inserted  successfully',
                    'alert-type' => 'success'
                );
            return redirect()->back()->with($notification); 


    }
    // deleteblogCat
    public function deleteblogCat($id){

        DB::table('post_categories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Category Deleted  successfully',
            'alert-type' => 'error'
        );
    return redirect()->back()->with($notification); 

    }
    // editBlogCat 
    public function editBlogCat($id){
        $editblogcat = DB::table('post_categories')->where('id', $id)->first();
        return view('admin.blog.category.edit',compact('editblogcat'));
    }
    // updateBlogCat
    public function updateBlogCat( Request $request ,$id){
        $data = array();
        $data['category_name_en'] = $request->category_name_en ;
        $data['category_name_in'] = $request->category_name_in ;
        $updatedata = DB::table('post_categories')->where('id', $id)->update( $data);
       if($updatedata ){
        $notification = array(
            'message' => 'Category updated  successfully',
            'alert-type' => 'success'
        );
            return redirect()->route('blogcategory_list')->with($notification); 
        }

    }
    // =========================== create post =========================
    public function addBlogpost(){

        $category =  DB::table('post_categories')->get();
        return view('admin.blog.create' ,compact('category'));

    }
}
