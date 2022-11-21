<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }
    public function storenewsletter(Request $request){
        $validateData = $request->validate([
            'email' => 'required |unique:newslaters|max:255',
        ]);
        $data = array();
        $data['email'] =    $request->email;
        $data['created_at'] =   Carbon::now();

        
        DB::table('newslaters')->Insert($data);
        $notification = array(
            'message' => 'Subscription   successfully done',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notification); 
    }

    public function ordertracking(Request $request ){
   
            $code = $request->code;

            $track = DB::table('orders')->where('status_code',$code)->first();
            if($track ){

           
                return view('frontend.tracking',compact('track'));

            }else {

                $notification = array(
                    'message' => 'Tracking code Invalid',
                    'alert-type' => 'error'
                );
                 return redirect()->back()->with($notification); 
            }
       
    }
}
