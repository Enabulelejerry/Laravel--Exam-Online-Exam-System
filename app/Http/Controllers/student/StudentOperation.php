<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\exam_question;
use App\Models\exam_question_answer;
use App\Models\exam_question_attempt;
use App\Models\feedback;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class StudentOperation extends Controller
{
    
    public function Exam(){
        if(!Session::get('id')){
            return redirect()->route('student_from')->with('error','please Login First');
           }
        $stu_id = Session::get('id');
        $stu_info = student::select(['students.*', 'assignstudents.*','exams.title','exams.exam_date'])->join('assignstudents','students.id','=','assignstudents.student_id')->join('exams','assignstudents.exam_id','=','exams.id')->where('students.id',$stu_id)->get();
        $stu_attempt = exam_question_attempt::join('exams','exam_question_attempts.exam_id','=','exams.id')->join('students','students.id','=','exam_question_attempts.student_id')->where('exam_question_attempts.student_id',$stu_id)->get();
        $countatt = count($stu_attempt);
        return view('student.Exam.student_exam',['student_info'=>$stu_info,'countatt'=>$countatt]);
    }


    public function JoinExam(Request $request, $id){
        if(!Session::get('id')){
            return redirect()->route('student_from')->with('error','please Login First');
           }

           $request->session()->put('new_exam_id',$id);
           
        $stu_id = Session::get('id');
        $stu_attmpt = exam_question_attempt::where('student_id',$stu_id)->where('exam_id',$id)->get();
        if(count($stu_attmpt)>0){
            $notification = array(
                'message' => 'Exam Taken',
                'alert-type' => 'error'
              );
        
              return redirect()->route('student.exam')->with($notification); 

        }

        $stu_attmpt = exam_question_attempt::where('student_id',$stu_id)->where('exam_id',$id)->get();
        $data['all_questions']= exam_question::where('exam_id',$id)->get();
        $data['exams']=Exam::where('status','1')->where('id',$id)->first();
        $data['exam_id'] = $id;
        // echo "<prev>";
        // print_r($data['exams']);
        // die();

         // For Timer
         $data['exam_answer'] = exam_question_answer::where('student_id', $stu_id)->where('exam_id', $id)->where('question_id', 0)->where('answer_option', 0)->get();

         if(count($data['exam_answer'])<1){
            
            $stu_id = Session::get('id');
            $exam_answer =  new exam_question_answer();
    
            $exam_answer->student_id = $stu_id;
            $exam_answer->exam_id = $id;
            $exam_answer->spent_total = 0;
            $exam_answer->answer_option	 = 0;
            $exam_answer->question_id= 0;
            $exam_answer->save();
         }
       
        $data['stu_info']  = student::find($stu_id);
       

      //for total time spent
        $data['exam_answer'] = exam_question_answer::where('student_id', $stu_id)->where('exam_id', $id)->where('question_id', 0)->where('answer_option', 0)->first();
        
          $stu_attmpt = exam_question_attempt::where('student_id',$stu_id)->where('exam_id',$id)->get();
        //   dd($stu_attmpt->toArray());
          if(count($stu_attmpt)>0){
            $notification = array(
                'message' => 'Exam Taken',
                'alert-type' => 'error'
              );
        
              return redirect()->route('student.exam')->with($notification); 
          }else{
            return view('student.Exam.join_exam',$data);
          }
        
      
        
    }


    public function QuizAction(Request $request){
     

        if(!Session::get('id')){
            return redirect()->route('student_from')->with('error','please Login First');
           }

        $stu_id = Session::get('id');
        if($request->question_id == ''){
            $all_questions = exam_question::where('exam_id',$request->exam_id)->where('cat_id',$request->cat_id)->orderBy('id', 'ASC')->limit(1)->get();
        }else{
            $all_questions = exam_question::where('id',$request->question_id)->get();
        }
       

        $output = '';
        foreach ($all_questions as $key => $question) {
            $output .= '
            <div class="card mt-5">
            <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                    <p> <b> Question - '.$question->exam_question_title.' </b> </p>';

                    $count = 1;
                    $temp_array = ['A', 'B', 'C', 'D'];
                    $temp_count = 0;

                    foreach(fetch_quest_option($question->id)  as $option ){

                        $is_checked = '';

                        if(Get_student_question_answer_option($question->id,$stu_id) == $count ){
                            $is_checked = 'checked';
                        }


                         
                        $output .='
                                
                                <div style="display:flex">
                                  <p>'.$temp_array[$temp_count].'</p>
                                  <div class="form-check" style="margin-left:10px">
                                  <input class="form-check-input answer_option" type="radio"  data-question_id="'.$question->id.'"  data-id="'.$count.'"  name="option_1" id="answer_option" '.$is_checked.'>
                                  <label class="form-check-label" for="flexRadioDefault'.$option->exam_option_number.'">'.   $option->question_option_title.'</label> 
                                 </div>
                                </div> 
            
                              
                        ';
                        $count++;
                        $temp_count++; 
                        
                    }
                 
                    $output .= '
                           </div>
                           </div>
                      </div>
                     </div>

                    ';

                    //query to select previous question id
    
                    $previous_result = exam_question::select('id')->where('id','<',$question->id)->where('exam_id',$request->exam_id)->where('cat_id',$request->cat_id)->orderBy('id', 'DESC')->limit(1)->get();
 
                    $previous_id = '';
				     $next_id = '';

                     foreach($previous_result as $previous_row)
				{
					$previous_id = $previous_row->id;

                    //  return response()->json($previous_id); 
				}


                $next_result = exam_question::select('id')->where('id','>',$question->id)->where('exam_id',$request->exam_id)->where('cat_id',$request->cat_id)->orderBy('id', 'ASC')->limit(1)->get();

                foreach($next_result as $next_row)
				{
					$next_id = $next_row->id;
				}

 
                  
				$if_previous_disable = '';
				$if_next_disable = '';

                
                if($previous_id == "")
				{
					$if_previous_disable = 'disabled';
				}
				
				if($next_id == "")
				{
					$if_next_disable = 'disabled';
				}

                //  $url = url('student/get_result/'.$request->exam_id) ;

                  $url = url('student/submit_exam/'.$request->exam_id) ;
				$output .= '
				  	<div align="center">
				   		<button type="button" name="previous" class="btn btn-info btn-lg previous" id="'.$previous_id.'" '.$if_previous_disable.'>Previous</button>
				   		<button type="button" name="next" class="btn btn-warning btn-lg next" id="'.$next_id.'" '.$if_next_disable.'>Next</button>
                         

                           <a href="'.$url.'" class="btn btn-success btn-lg" id="submitexan" style="margin-left:40px">Submit</a>

				  	</div>
				  	</div></div>';

               

                    // return response()->json($next_result); 

            
        }

         echo $output;
        // return response()->json($output); 
    }


    public function SubmitAnswer(Request $request){
        $stu_id = Session::get('id');
           $exam_answer = exam_question_answer::where('student_id',$stu_id)->where('question_id',$request->question_id)->get();

            $anscount  = count($exam_answer);

            if($anscount > 0){
                $exam_answer = exam_question_answer::where('student_id',$stu_id)->where('question_id',$request->question_id)->get()->first();

                $exam_answer->answer_option = $request->answer_option;
                $exam_answer->update();
            }else{
                $exam_answer = new exam_question_answer();

                $exam_answer->student_id = $stu_id;
                $exam_answer->question_id = $request->question_id;
                $exam_answer->exam_id = $request->exam_id;
                $exam_answer->answer_option = $request->answer_option;
               
                $exam_answer->save();


            }
        
    }
    public function UpdateTimer(Request $request){
        $stu_id = Session::get('id');
        $exam_answer = exam_question_answer::where('student_id', $stu_id)->where('exam_id', $request->exam_id)->where('question_id', 0)->where('answer_option', 0)->first();

        $exam_answer->spent_total=$request->total_spend;
        $exam_answer->save();
       
    }
     public function GetResult(Request $request,$id){   
        if(!Session::get('id')){
            return redirect()->route('student_from')->with('error','please Login First');
           }
        $stu_id = Session::get('id');
        $exam_id =$id;
        $exam = Exam::find($id);
        $exam_answer = exam_question_answer::where('student_id', $stu_id)->where('exam_id', $exam_id)->where('question_id', 0)->where('answer_option', 0)->first();
        $exam_answer->spent_total=0;
        $exam_answer->update();
  
$Examscore = exam_question::select("exam_questions.*","exam_question_answers.*")
->join("exam_question_answers",function($join) use($stu_id,$exam_id){
    $join->on('exam_question_answers.question_id','exam_questions.id')
        ->on('exam_question_answers.answer_option','exam_questions.exam_question_answer')
        ->where('exam_question_answers.exam_id',$exam_id)
        ->where('exam_question_answers.student_id',$stu_id);
})
->get();


$all_questions = exam_question::
join("exam_question_answers",function($join) use($stu_id,$exam_id){
    $join->on('exam_question_answers.question_id','exam_questions.id')
        ->where('exam_question_answers.exam_id',$exam_id)
        ->where('exam_question_answers.student_id',$stu_id);
})
->get();
// dd($Examscore->toArray());
   
     

    //  $all_questions = exam_question::join('exam_question_answers', 'exam_question_answers.question_id','=', 'exam_questions.id')->where('exam_question_answers.exam_id',$id)->where('exam_question_answers.student_id',$stu_id)->get();

    //  $selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
  
        
       $failed_question = count($all_questions)-count($Examscore);
        
    //    dd($failed_question);


       $stu_info = student::find($stu_id);

    //    $exam_attempt = new exam_question_attempt();
    //    $exam_attempt->student_id = $stu_id;
    //    $exam_attempt->exam_id = $exam_id;
    //    $exam_attempt->save();

         return view('student.Exam.show_result', compact('stu_id','Examscore','all_questions','exam_id','stu_info','exam','failed_question'));
     }

     public function SubmitExam($id){

        $stu_id = Session::get('id');
        $exam_id =$id;

        $exam_attempt = new exam_question_attempt();
        $exam_attempt->student_id = $stu_id;
        $exam_attempt->exam_id = $exam_id;
        $exam_attempt->save();
 
        $notification = array(
            'message' => 'You can check your result',
            'alert-type' => 'success'
          );
    
          return redirect()->route('student.exam')->with($notification);
     }


     public function SendFeedback(){
        $stu_id = Session::get('id');
        $stu_info = student::find($stu_id);
        return view('student.feedback.send_back', compact('stu_info'));
     }

     public function StoreFeedback(Request $request){
        $stu_id = Session::get('id');
        $feedback = new feedback();
        $feedback->student_id = $stu_id;
        $feedback->fb_as = $request->name;
        $feedback->fb_msg = $request->fb_msg;
        $feedback->save();
        $notification = array(
            'message' => 'Feedback Sent Successfully',
            'alert-type' => 'success'
          );
    
          return back()->with($notification); 
      

     }

    public function Logout(Request $request){
        Auth::Logout();
        $request->session()->forget('student_session');
        $request->session()->put('new_exam_id');
        
       return Redirect()->route('student_from');
    }
}
