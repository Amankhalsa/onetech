<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    //adminViewcoupon
    public function adminViewcoupon(){
            $viewCoupon =  DB::table('coupons')->get();
        return view('admin.coupon.view_coupon',compact('viewCoupon'));

    }
    // store.coupon
    public function adminStorecoupon(Request $request ){
        $validateData = $request->validate([
            'coupon' => 'required|unique:coupons|max:255',
            'discount' => 'required',

        ]);
        $data = array();
        $data['coupon'] =  $request->coupon ;
        $data['discount'] =  $request->discount ;
        DB::table('coupons')->insert($data);
        $notification = array(
            'message' => 'coupon Inserted  successfully',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notification); 
    }
    // adminDeletecoupon
    public function adminDeletecoupon($id){
        $delete  = DB::table('coupons')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted  successfully',
            'alert-type' => 'error'
        );
         return redirect()->back()->with($notification); 
    }
    // editCoupon
    public function adminEditcoupon($id){
        $editCoupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin.coupon.edit_coupon',compact('editCoupon'));

    }
    // adminUpdatecoupon
    public function adminUpdatecoupon(Request $request ,$id){
        $data = array();
        $data['coupon'] =  $request->coupon ;
        $data['discount'] =  $request->discount ;
        DB::table('coupons')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'coupon Updated  successfully',
            'alert-type' => 'success'
        );
         return redirect()->route('admin.coupon')->with($notification); 
    }
    // ViewNewsletter
    public function ViewNewsletter(){
        $viewNewsletter = DB::table('newslaters')->get();
        return view('admin.coupon.view_Newsletter',compact('viewNewsletter'));

    }
    // deletenewsletter
    public function adminDeletenewsletter($id){
        DB::table('newslaters')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Newsletter Updated  successfully',
            'alert-type' => 'error'
        );
         return redirect()->back()->with($notification); 

    }

    public function allDelete(Request $request ){
        $ids = $request->get('ids');
        // dd($ids);
        foreach($ids as $val){
            DB::table('newslaters')->where('id', $val)->delete();
        }
        return redirect()->back()->with('success' ,'Data deleted success');
}
}
