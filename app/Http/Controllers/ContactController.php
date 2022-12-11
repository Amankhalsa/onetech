<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function contact_page(){
        
        return view('frontend.contact_page');

    }
    public function store_contact_msg(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        DB::table('contacts')->insert($data);
    
               
               $notification = array(
                'message' => 'Your Message Insert Successfully',
                'alert-type' => 'success'
            );

             return Redirect()->back()->with($notification); 
    }

    public function all_contact_msg(){
        $message =	DB::table('contacts')->get();
        return view('admin.contact.all_message',compact('message'));
    }
}
