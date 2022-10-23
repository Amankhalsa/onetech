<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\fileExists;

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
    // storeBlogpost
    public function storeBlogpost(Request $request){
            $data = array();
            $data['post_title_en'] = $request->post_title_en;
            $data['post_title_in'] = $request->post_title_in;
            $data['category_id'] = $request->category_id;
            $data['details_en'] = $request->details_en;
            $data['details_in'] = $request->details_in;
            // post_image
     
            $blogimage = $request->post_image;
            if($blogimage){
                $blog_name_one = hexdec(uniqid());
                $ext1=  strtolower( $blogimage->getClientOriginalExtension());
                $imageFullname1 =    $blog_name_one.'.'.$ext1;
                $upload_path ='media/blogpost/';
                Image::make($blogimage)->resize(400,200)->save( $upload_path. $imageFullname1 );
                $data['post_image']  =  $upload_path. $imageFullname1;

                DB::table('posts')->insert($data);
                $notification = array(
                    'message' => 'Post Inserted  successfully',
                    'alert-type' => 'success'
                                );
                return redirect()->route('view.blog_post')->with($notification); 
            }else{
                $data['post_image']  =  '';
                DB::table('posts')->insert($data);
                $notification = array(
                    'message' => 'Post Inserted successfully without image ',
                    'alert-type' => 'success'
                                );
                return redirect()->route('view.blog_post')->with($notification); 
            }


        
    }

    // viewBlogpost
    public function viewBlogpost(){
        $blogpost=   DB::table('posts')
        ->join('post_categories','posts.category_id', 'post_categories.id')
        ->select('posts.*','post_categories.category_name_en' )
        ->get();
        return view('admin.blog.index' ,compact('blogpost'));

    }
    // edit.blogPost
    public function editBlogpost($id){
        $category =  DB::table('post_categories')->get();

        $editblogpost =   DB::table('posts')->where('id',$id)->first();
        return view('admin.blog.edit' ,compact('editblogpost','category'));

    }
    // deleteBlogpost
    public function deleteBlogpost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->post_image;
        if(fileExists($image))
        {
            unlink($image); 
            DB::table('posts')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Blog Category Deleted Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }


    }
    // update.blogpost
    public function updateBlogpost( Request $request ,$id)
    {
        $old_image =$request->oldimage;
        $data = array();
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_in'] = $request->post_title_in;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_in'] = $request->details_in;
        // post_image
 
        $blogimage = $request->post_image;
        if($blogimage){
         
            if(fileExists($old_image))
            {
          
                unlink($old_image);
            }
            $blog_name_one = hexdec(uniqid());
            $ext1=  strtolower( $blogimage->getClientOriginalExtension());
            $imageFullname1 =    $blog_name_one.'.'.$ext1;
            $upload_path ='media/blogpost/';
            Image::make($blogimage)->resize(400,200)->save( $upload_path. $imageFullname1 );
            $data['post_image']  =  $upload_path. $imageFullname1;

            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Post updated  successfully',
                'alert-type' => 'success'
                            );
            return redirect()->route('view.blog_post')->with($notification); 
        }else{
            $data['post_image']  =  '';
            DB::table('posts')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Post updated successfully without image ',
                'alert-type' => 'info'
                            );
            return redirect()->route('view.blog_post')->with($notification); 
        }
    }
}
