<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;

class StudentController extends Controller
{
    public function Index()
    {
        return view('student.student_login');
    }


    
    public function Login(Request $request){
        $stu = student::where('email',$request->email)->where('password',$request->password)->get()->toArray();
   
        if($stu){
            if($stu[0]['status']==1){
                $request->session()->put('id',$stu[0]['id']);
                return redirect()->route('student.exam')->with('success','Student Login Successfully');
            }else{
                return redirect()->route('student_from')->with('error','Your Account Is Deactived');
            }
           
        }else{
            // echo 0;
            return back()->with('error','Invalid Email Or Password');
        }

    }


    public function Dashbaord(){
        if(!Session::get('id')){
            return redirect()->route('student_from')->with('error','please Login First');
           } 
    
           return view('student.index');
    }
}
