<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    //
    public function add_To_Wishlist($id){
        $user_id = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$user_id)->where('product_id',$id)->first();
     
        $data = array();
        $data['user_id']  = $user_id;
        $data['product_id']  = $id;
        $data['created_at']  = Carbon::now();

        if(Auth::check()){
            if( $check ){
                return response()->json(['error' => 'Already in your wishlist']);
            }
            else {
                DB::table('wishlists')->insert($data);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
                }
        }else{
         
            
            return response()->json(['error' => 'At first login your Account']);  
        }
    }
}
