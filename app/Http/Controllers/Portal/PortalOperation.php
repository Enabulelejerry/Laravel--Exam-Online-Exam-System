<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\assignstudent;
use App\Models\Exam;
use App\Models\student;
use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;

class PortalOperation extends Controller
{


public function Dashbaord(){

    if(!Session::get('portal_session')){
        return redirect()->route('portal_from')->with('error','please Login First');
       } 
       $data['portal_exams'] = Exam::select(['exams.*','categories.name as cat_name'])->join('categories','exams.category','=','categories.id')->orderBy('id','desc')->where('exams.status','1')->get();

    //    dd($data['portal_exams']->toArray());

       return view('portal.index',$data);
}


  public function ExamForm($id){

    $data['id'] = $id;
     $exam_info = Exam::where('id',$id)->get()->first();
     $data['exam_title']=$exam_info->title;
     $data['exam_date']=$exam_info->exam_date;
    //  $data['exam_title']=$exam_info->title;
    //  $data['exam_title']=$exam_info->title;
    return view('portal.form.exam_form',$data);
   }

   public function ExamFormSubmit(Request $request){

    $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required', 'password'=>'required']);

    if($validator->passes()){

        $std = new student();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->gender=$request->gender;
        $std->dob=$request->dob;
        $std->status=1;
        $std->password=$request->password;
        $std->save();

        $assign_student = new assignstudent();
         $assign_student->student_id = $std->id;
         $assign_student->exam_id = $request->id;
         $assign_student->save();
        $arr=array('status'=>'true','message'=>'success','reload'=>url('portal/print/'.$std->id));
    }else{
      $arr=array('status'=>'false','message'=>$validator->errors()->all());   
    }

    echo json_encode($arr);

   }

   public function FormPrint($id){
     $std_info = student::where('id',$id)->get()->first();
     $ass_info = assignstudent::where('student_id',$std_info->id)->get()->first();
      $exam_info = Exam::where('id',$ass_info->exam_id)->get()->first(); 
      // dd($exam_info);
     $exam_title = $exam_info->title;
     $exam_date = $exam_info->exam_date;
     return view('portal.form.print',['std_info'=>$std_info,'exam_title'=>$exam_title,'exam_date'=>$exam_date]);
     
   }

   public function UpdateForm(){

    if(!Session::get('portal_session')){
      return redirect()->route('portal_from')->with('error','please Login First');
     } 

     $data['exams']=Exam::where('status','1')->get();
    return view('portal.form.update_form',$data);
   }

   public function SearchStuInfo(){
    $data['exam_info'] = Exam::where('id',$_GET['exam'])->get()->first();
    // $exam_id = $data['exam_info']->id;
    // // dd($exam_id);
    $data['student_info']  = student::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->first();
    $student_id = $data['student_info']->id;
    // dd($data['student_info']->toArray());
    $data['ass_stu'] = assignstudent::where('exam_id',$_GET['exam'])->where('student_id',$student_id)->first();

    // dd($data['ass_stu']);

    if($data['student_info'] != NULL && $data['ass_stu'] != NULL){
      if(!Session::get('portal_session')){
        return redirect()->route('portal_from')->with('error','please Login First');
       } 
        return view('portal.form.student_exam_info',$data);
    }
    else{
        
        $notification = array(
            'message' => 'No Record Found',
            'alert-type' => 'error'
          );
    
 
    }

 
    return back()->with($notification);   
    
   }

   public function UpdateStuInfo(Request $request){
        
    $std = student::where('id',$request->id)->get()->first();
    $std->name=$request->name;
    $std->email=$request->email;
    $std->mobile_no=$request->mobile_no;
    $std->dob=$request->dob;
    $std->gender=$request->gender;
    if($request->password){
        $std->password=$request->password;
    }

    $std->update();

     echo json_encode(array('status'=>'true','message'=>'success','reload'=>route('portal.update_form')));
    
   }

   public function Logout(Request $request){
    Auth::guard('portal')->Logout();
    $request->session()->forget('portal_session');
   return Redirect()->route('portal_from');
}
}
