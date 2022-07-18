<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assignstudent;
use App\Models\Category;
use App\Models\Exam;
use App\Models\exam_question;
use App\Models\feedback;
use App\Models\portal;
use App\Models\question_option;
use App\Models\student;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }

    public function Login(Request $request){  
        //dd($request->all());
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'],'password' => $check['password']])){
            return redirect()->route('admin.dashboard')->with('success','Admin Login Successfully');
        }else{
            return back()->with('error','Invalid Email Or Password');
        }
    }

    public function Dashboard(){

        return view('admin.index');
    }


    public function ExamCategory(){
        $data['category'] = Category::orderBy('id','desc')->get();
        return view('admin.backend.Cat.category',$data);
    }

    public function add_category(Request $request){
        
        $validator = Validator::make($request->all(),['name'=>'required']);
   
      if($validator->passes()){
            
      $cat  = new Category();
      
      $cat->name = $request->name;
      $cat->status=1;
      $cat->save();
      $arr=array('status'=>'true','message'=>'success','reload'=>route('exam_category'));
      } else{
       
        $arr=array('status'=>'false','message'=>$validator->errors()->all());

      }

      echo json_encode($arr);
   
    }

    public function DeleteCat($id){
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->route('exam_category');
    }

    public function EditCat($id){
        $data['category'] = Category::find($id);
        return view('admin.backend.Cat.edit_category',$data);
    }

    public function UpdateCat(Request $request){
     
        $cat = Category::where('id',$request->id)->get()->first();
        $cat->name=$request->name;
        $cat->update();
         echo json_encode(array('status'=>'true','message'=>'Category Updated Successfully','reload'=>route('exam_category')));

    }

    public function CatStatus($id){
       
        $cat = Category::where('id',$id)->get()->first();
        if($cat->status==1){
            $status=0;
            $cat = Category::where('id',$id)->get()->first();
            $cat->status=$status;
            $cat->update();

        }else{
            $status=1;
            $cat = Category::where('id',$id)->get()->first();
            $cat->status=$status;
            $cat->update();
        }
    }


    public function ExamView(){
        $data['category'] = Category::orderBy('id','desc')->where('status','1')->get();

        $data['exams'] = Exam::
        select('exams.*','categories.name as cat_name')
        ->join('categories','exams.category','=','categories.id')
        ->get();
        return view('admin.backend.exam.exam_view',$data);
    }

  public function AddExam(Request $request){
   
    $validator = Validator::make($request->all(),['title'=>'required','exam_date'=>'required','exam_category'=>'required',]);

    if($validator->passes()){
        $exam  = new Exam();
        $exam->title = $request->title;
        $exam->category = $request->exam_category;
        $exam->exam_date = $request->exam_date;
        $exam->duration = $request->duration;
        $exam->status = 1;
        $exam->save();
        $arr=array('status'=>'true','message'=>'Exam Successfully Added','reload'=>route('manage_exam'));

    }else{
        $arr=array('status'=>'false','message'=>$validator->errors()->all()); 
    }

    echo json_encode($arr);
   
  }

  public function ExamStatus($id){
    $exam = Exam::where('id',$id)->get()->first();
  
    if($exam->status==1){
        $status=0;
        $exam = Exam::where('id',$id)->get()->first();
        $exam->status=$status;
        $exam->update();

    }else{
        $status=1;
        $exam = Exam::where('id',$id)->get()->first();
        $exam->status=$status;
        $exam->update();
    }
  }

  public function DeleteExam($id){

    $exam = Exam::find($id);
    $exam->delete();
    return redirect()->route('manage_exam');
  }

  public function EditExam($id){
    $data['category'] = Category::orderBy('id','desc')->where('status','1')->get();
    $data['exam'] = Exam::find($id);
    // dd($data['exam']->toArray());
    return view('admin.backend.exam.edit_Exam',$data);
  }

  public function UpdateExam(Request $request){
    $exam= Exam::where('id',$request->id)->get()->first();
        $exam->title=$request->title;
        $exam->category=$request->exam_category;
        $exam->exam_date=$request->exam_date;
        $exam->duration = $request->duration;
        
        $exam->update();
         echo json_encode(array('status'=>'true','message'=>'Exam Updated Successfully','reload'=>route('manage_exam')));

  }

  public function ExamineeView(){

    $data['exams'] = Exam::where('status','1')->get();
    // $data['students'] = student::select(['students.*','exams.title as ex_name','exams.exam_date as ex_date'])->join('exams','students.exam','=','exams.id')->get()->toArray();
    $data['students'] = student::orderBy('id','desc')->get();
  

    // $data['exams'] = Exam::
    //     select('exams.*','categories.name as cat_name')
    //     ->join('categories','exams.category','=','categories.id')
    //     ->get();

    return view('admin.backend.Examinee.View_examinee',$data);
  }

  public function ExamineeAssignView(){
    $data['students'] = student::orderBy('id','desc')->where('status','1')->get();
    $data['exams'] = Exam::where('status','1')->get();
    $data['assigns'] = assignstudent::select(['assignstudents.*','exams.exam_date','students.name','exams.title'])->join('exams','assignstudents.exam_id','=','exams.id')->join('students','assignstudents.student_id','=','students.id')->get();

  return view('admin.backend.Examinee.assign_examinee',$data);

  }


  public function AssignStudent(Request $request){

    $validator = Validator::make($request->all(),['student_id'=>'required','exam_id'=>'required']);
    if($validator->passes()){
        $asgn = new assignstudent();
        $asgn->student_id=$request->student_id;
        $asgn->exam_id=$request->exam_id;
        $asgn->save();
        $arr=array('status'=>'true','message'=>'Examinee Assigned Successfully','reload'=>route('assign_examinee'));
    }
    else{
        $arr=array('status'=>'false','message'=>$validator->errors()->all()); 
    }

    echo json_encode($arr);
  }


  public function EditAssign($id){
    $data['students'] = student::orderBy('id','desc')->where('status','1')->get();
    $data['exams'] = Exam::where('status','1')->get();
    $data['editass']  = assignstudent::find($id);
    return view('admin.backend.Examinee.edit_assign',$data);
      
  }

  public function UpdateAssign(Request $request){
   
    $updateAssign= assignstudent::where('id',$request->id)->get()->first();
    $updateAssign->student_id=$request->student_id;
    $updateAssign->exam_id=$request->exam_id;
    $updateAssign->update();
    echo json_encode(array('status'=>'true','message'=>'Successfully Updated','reload'=>route('assign_examinee')));

  }

  public function DeleteAssign($id){
     
    $deleteAssign = assignstudent::find($id);
    $deleteAssign->delete();
    return redirect()->route('assign_examinee');
  }


  public function AddStudent(Request $request){
    // echo "prev";
    // print_r($request->all());

    $validator = Validator::make($request->all(),['name'=>'required','email'=>'required|unique:students,email','mobile_no'=>'required', 'dob'=>'required', 'gender'=>'required', 'password'=>'required',]);

    // 'name' => 'required|unique:student_shifts,name', 

    if($validator->passes()){
      
        $std = new student();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->gender=$request->gender;
        $std->password=$request->password;
        $std->dob=$request->dob;
        $std->status=1;
        $std->save();
        $arr=array('status'=>'true','message'=>'Examinee Successfully Added','reload'=>route('manage_examinee'));
    }
    else{
        $arr=array('status'=>'false','message'=>$validator->errors()->all()); 
    }

    echo json_encode($arr);

  }

  public function StuStatus($id){
    
    $stu = student::where('id',$id)->get()->first();
  
    if($stu->status==1){
        $status=0;
        $stu = student::where('id',$id)->get()->first();
        $stu->status=$status;
        $stu->update();

    }else{
        $status=1;
        $stu = student::where('id',$id)->get()->first();
        $stu->status=$status;
        $stu->update();
    }
  }

  public function DeleteExaminee($id){
    $stu = student::find($id);
    dd($stu->toArray());
    die();
    $stu->delete();
    return redirect()->route('manage_examinee');

  }

  public function EditExaminee($id){

    $data['student'] = student::find($id);
  
    return view('admin.backend.Examinee.edit_stu',$data);
  }

  public function UpdateStudent(Request $request){
    $std= student::where('id',$request->id)->get()->first();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->gender=$request->gender;
        if($request->password!=''){
          $std->password=$request->password;
        }
        $std->dob=$request->dob;
        $std->update();
        echo json_encode(array('status'=>'true','message'=>'Student Successfully Updated','reload'=>route('manage_examinee')));
       
  }


  public function AddQuestion(){
    $data['exams']=Exam::where('status','1')->get();
    $data['categorys']=Category::where('status','1')->get();

    $data['exam_questions'] = exam_question::select(['exam_questions.*','exams.title'])->join('exams','exam_questions.exam_id','=','exams.id')->get(); 
   
     return view('admin.backend.Question.add_question',$data);
  }

  public function StoreQuestion(Request $request){

    
      
    $validator = Validator::make($request->all(),['exam_id'=>'required','question_title'=>'required','option1'=>'required', 'option2'=>'required', 'option3'=>'required', 'option4'=>'required','exam_question_answer'=>'required']);

    if($validator->passes()){
      $new_cat='';
      $cat_id='';
       
        $exams = Exam::where('id',$request->exam_id)->get();

        // $previous_result = exam_question::select('id')->where('id','<',$question->id)->where('exam_id',$request->exam_id)->orderBy('id', 'DESC')->limit(1)->get();
            
        foreach($exams as $ex)
				{
				  $cat_id =	$ex->category;
          // echo json_encode($cat_id);
				}
        

    //     //  echo "prev";
    //     // print_r($cat_id);

    //  die();

     $question_table = new exam_question();

    $question_table->exam_id = $request->exam_id;
    $question_table->cat_id = $cat_id;
    $question_table->exam_question_title = $request->question_title;
    $question_table->exam_question_answer = $request->exam_question_answer;

    $question_table->save();

     $option_array = array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4);
     $option_array_count = count($option_array);
       
     for ($i=1; $i <=$option_array_count ; $i++) {
        
      $question_option = new question_option();
      $question_option->exam_question_id = $question_table->id;
      $question_option->exam_option_number = $i;
      $question_option->question_option_title =$_POST['option' . $i];
      $question_option->save();
     }
     
     $arr=array('status'=>'true','message'=>'Questions Successfully Added','reload'=>route('add_question'));

    }
    else{
      $arr=array('status'=>'false','message'=>$validator->errors()->all()); 
  }
  echo json_encode($arr);
  }

  public function EditQuestion($id){
    $data['exam_question'] = exam_question::select(['exam_questions.*','exams.title'])->join('exams','exam_questions.exam_id','=','exams.id')->where('exam_questions.id',$id)->get()->first();

    $data['qst_options'] = question_option::where('exam_question_id',$id)->get();
    return view('admin.backend.Question.edit_question',$data);
  }

  public function UpdateQuestion(Request $request){
 
    $question_table = exam_question::where('id', $request->id)->get()->first();
    $question_table->exam_question_title = $request->question_title;
    $question_table->exam_question_answer = $request->exam_question_answer;
    $question_table->update();
    
     $option_array = array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4);
     $option_array_count = count($option_array);
       
     for ($i=1; $i <=$option_array_count ; $i++) {
      $question_option = question_option::where('exam_question_id',$request->id)->where('exam_option_number',$i)->get()->first(); 
       $question_option->question_option_title =$_POST['option' . $i];
       $question_option->update();
     }

      echo json_encode(array('status'=>'true','message'=>'Questions Updated Successfully Added','reload'=>route('add_question')));
    }

  
    public function DeleteQuestion($id){

      echo $id;

      $question_table = exam_question::find($id);
      $question_table->delete();
      $question_option = question_option::where('exam_question_id',$id);
      $question_option->delete();


    //   $stu = student::find($id);
    // $stu->delete();
    // return redirect()->route('manage_examinee');

      $notification = array(
        'message' => 'Question Deleted Successfully',
        'alert-type' => 'success'
      );

      return back()->with($notification); 
    }
   
 
  


  public function PortalView(){
    $data['portals'] = portal::orderBy('id','desc')->get();
      return view('admin.backend.Portal.view_portal',$data);
  }

  public function AddPortal(Request $request){
    $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required', 'password'=>'required',]);
    if($validator->passes()){ 
        $portal = new portal();
        $portal->name=$request->name;
        $portal->email=$request->email;
        $portal->mobile_no=$request->mobile_no;
        $portal->password=$request->password;
        $portal->status=1;
        $portal->save();
        $arr=array('status'=>'true','message'=>'Portal Successfully Added','reload'=>route('manage_portal'));
    }
    else{
        $arr=array('status'=>'false','message'=>$validator->errors()->all()); 
    }

    echo json_encode($arr);
  }


  public function PortalStatus($id){

      
    $portal = portal::where('id',$id)->get()->first();

    if($portal->status==1){
        $status=0;
        $portal = portal::where('id',$id)->get()->first();
        $portal->status=$status;
        $portal->update();

    }else{
        $status=1;
        $portal = portal::where('id',$id)->get()->first();
        $portal->status=$status;
        $portal->update();
    }
  }


  public function DeletePortal($id){
    $portal = portal::find($id);
    $portal->delete();
    return redirect()->route('manage_portal');
  }

  public function EditPortal($id){
    $data['portal'] = portal::find($id);
    return view('admin.backend.Portal.edit_portal',$data);

  }

  public function UpdatePortal(Request $request){
    $portal= portal::where('id',$request->id)->get()->first();
    $portal->name=$request->name;
    $portal->email=$request->email;
    $portal->mobile_no=$request->mobile_no;
    if($request->password!=''){
      $portal->password=$request->password;
    }
  
    $portal->update();
    echo json_encode(array('status'=>'true','message'=>'Student Successfully Updated','reload'=>route('manage_portal')));

  }


public function ResultView(){
    
  $data['exams'] = Exam::
  select('exams.*','categories.name as cat_name')
  ->join('categories','exams.category','=','categories.id')
  ->where('exams.status','1')->get();
  return view('admin.backend.Result.view_result',$data);
  // dd($data['exams']->toArray());
}

public function ShowRankResult($id){
   $data['selEx']  = Exam::where('id',$id)->first();

   $data['exam_id']  =  $data['selEx']->id;

   $data['selStudent']=assignstudent::select(['students.*'])->join('students','assignstudents.student_id','students.id')->where('exam_id',$data['exam_id'])->get();
  
   return view('admin.backend.Result.view_student_result',$data); 
     
  
}

public function FeedbackView(){

  $data['allfeebacks'] = feedback::get();
  return view('admin.backend.feedback.view_student_feedback',$data); 

}


  public function Logout(){
    Auth::guard('admin')->Logout();
   return Redirect()->route('login_from');
}


}
