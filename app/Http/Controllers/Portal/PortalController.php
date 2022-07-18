<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function Index(){

         return view('portal.portal_login');
    }
    

    public function Login(Request $request){
        $portal = portal::where('email',$request->email)->where('password',$request->password)->get()->toArray();

        if($portal){
            if($portal[0]['status']==1){
                $request->session()->put('portal_session',$portal[0]['id']);
                return redirect()->route('portal.dashboard')->with('success','Admin Login Successfully');
            }else{
                return redirect()->route('portal_from')->with('error','Your Account Is Deactived');
            }
           
        }else{
            // echo 0;
            return back()->with('error','Invalid Email Or Password');
        }

    }
}
