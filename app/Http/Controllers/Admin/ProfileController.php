<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function ViewProfile(){
        $id = Auth::guard('admin')->user()->id;
        $users = Admin::find($id);
        return view('admin.backend.user.view_profile',compact('users'));

      
    }

    public function UpdateProfile(Request $request){
       
        $data = Admin::find(Auth::guard('admin')->user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->position = $request->position;

        $data->save();

        $notification = array(
            'message' => 'User Profile updated  Successfully',
            'alert-type' => 'success'
         );
         return redirect()->route('view_profile')->with($notification);
    

    }
}
