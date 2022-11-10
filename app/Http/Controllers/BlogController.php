<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    //
    public function addblogpost(){
        $post = DB::table('posts')
        ->join('post_categories','posts.category_id','post_categories.id')
        ->select('posts.*' ,'post_categories.category_name_en','post_categories.category_name_in')
        ->get();
    //   return response()->json($post);
         return view('frontend.blog',compact('post'));
    }

    public function language_english(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'English');
        return redirect()->back();
    }

    public function language_hindi(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'hindi');
        return redirect()->back();


    }
public function continuereading($id){
    $getnlog = DB::table('posts')->where('id',$id)->first();
    return view('frontend.single',compact('getnlog'));
}


}
