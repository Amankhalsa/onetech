<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainUserController extends Controller
{
    //userLogout
    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
        
    }
    public function userProfile(){
        $id = Auth::User()->id;
   
        $getProfile = User::find($id);
        return view('user.profile.user_profile', compact('getProfile'));
    }
    // editUserProfile
    public function editUserProfile(){

        $id = Auth::User()->id;
   
        $editProfile = User::find($id);
        return view('user.profile.edit_user_profile', compact('editProfile'));
    }
    // updateProfile
    public function updateProfile(Request $request ){
        $data = User::find(Auth::user()->id);
        $data->name =  $request->name;
        $data->email =  $request->email;

            if($request->file('profile_photo_path')){
                if(file_exists(public_path('upload/user_images/'.$data->profile_photo_path))){
                    unlink(public_path('upload/user_images/'.$data->profile_photo_path));
                }
                $file = $request->file('profile_photo_path');
                $filename = date('dmyHi'). $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data['profile_photo_path'] =  $filename ;
               
            }
            $data->save();
            $notification = array(
                'message' => 'User profile Updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user.profile')->with($notification);
    }
    // userPasswordView
    public function userPasswordView(){
        return view('user.password.editpassword');
    }
    // userPasswordupdate
    public function userPasswordupdate(Request $request ){

    	$validateData = $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
                ]);
        $hashpassword = Auth::user()->password;
        // dd($hashpassword);
            if(Hash::check($request->oldpassword,$hashpassword)){
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login');
            }else {
                $notification = array(
                    'message' => 'Password does not Matched',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
    }
}
