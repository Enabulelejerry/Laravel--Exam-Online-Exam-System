<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function ChangePassword(){
        return view ('admin.backend.password.change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword'=>'required',
            'password'=> 'required|confirmed',
  
          ]);

          $hashedPassword = Auth::guard('admin')->user()->password;

          
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = Admin::find(Auth::guard('admin')->id());
            $user->password= Hash::make($request->password);
            $user->save();
            Auth::guard('admin')->Logout();
            return Redirect()->route('login_from');
        }else{
            $notification = array(
                'message' => 'Wrong Password',
                'alert-type' => 'error'
             );
            return Redirect()->route('changepassword')->with($notification);
        }
       
    }
}
