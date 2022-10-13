<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainAdminController extends Controller
{
    //adminProfile
    public function adminProfile(){

        $getadminProfile = Admin::find(1);
        return view('admin.profile.view_profile', compact('getadminProfile'));
    }
    // editadminProfile
    public function editadminProfile(){
        $editProfile = Admin::find(1);
        return view('admin.profile.edit_profile', compact('editProfile'));

    }
    // updateadminProfile
    public function updateadminProfile(Request $request ){
        $data = Admin::find(1);
        $data->name =  $request->name;
        $data->email =  $request->email;

            if($request->file('profile_photo_path')){
                if(file_exists(public_path('upload/admin_images/'.$data->profile_photo_path))){
                    unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
                }
                $file = $request->file('profile_photo_path');
                $filename = date('dmyHi'). $file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'), $filename);
                $data['profile_photo_path'] =  $filename ;
               
            }
            $data->save();
            $notification = array(
                'message' => 'Admin profile Updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile')->with($notification);
    }
    // adminPasswordView
    public function adminPasswordView(){
        return view('admin.password.view_password');

    }
    // updateAdminPassword
    public function updateAdminPassword(Request $request){
        $validateData = $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
                ]);
                $hashpassword =  Admin::find(1)->password;
                // dd($hashpassword);
                    if(Hash::check($request->oldpassword,$hashpassword)){
                        $admin = Admin::find(1);
                        $admin->password = Hash::make($request->password);
                        $admin->save();
                        Auth::logout();
                        return redirect()->route('admin.logout');
                    }else {
                        $notification = array(
                            'message' => 'Password does not Matched',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
    }
}
