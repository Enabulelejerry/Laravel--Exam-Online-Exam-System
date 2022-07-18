<?php

use App\Models\Category;
use App\Models\Exam;
use App\Models\exam_question;
use App\Models\exam_question_answer;
use App\Models\exam_question_attempt;
use App\Models\feedback;
use App\Models\question_option;
use App\Models\student;

function fetch_quest_option($id){
    $options = question_option::where('exam_question_id',$id)->get();
    return $options;
}

function Get_get_student_score($stu_id,$exam_id){
    $Examscore = exam_question::select("exam_questions.*","exam_question_answers.*")
->join("exam_question_answers",function($join) use($stu_id,$exam_id){
    $join->on('exam_question_answers.question_id','exam_questions.id')
        ->on('exam_question_answers.answer_option','exam_questions.exam_question_answer')
        ->where('exam_question_answers.exam_id',$exam_id)
        ->where('exam_question_answers.student_id',$stu_id);
})->Orderby('exam_question_answers.id','DESC')
->get();

 $countScore = count($Examscore);

return $countScore;
}

function Get_total_exam_question($stu_id,$exam_id){
    $all_questions = exam_question::
join("exam_question_answers",function($join) use($stu_id,$exam_id){
    $join->on('exam_question_answers.question_id','exam_questions.id')
        ->where('exam_question_answers.exam_id',$exam_id)
        ->where('exam_question_answers.student_id',$stu_id);
})
->get();

$countquestion =count($all_questions);
  
return  $countquestion;
}

function Get_student_attempt($stu_id,$exam_id){
    $stu_attmpt = exam_question_attempt::where('student_id',$stu_id)->where('exam_id',$exam_id)->get();
     $count_attmpt = count($stu_attmpt);
     return $count_attmpt;
}

  
function Get_student_question_answer_option($question_id,$student_id){
     
    $results = exam_question_answer::where('question_id',$question_id)->where('student_id',$student_id)->get();

    foreach($results as $result){
        return $result->answer_option;
    }

}

function Get_total_exam(){
    $exam = Exam::where('status',1)->get();
    $examCount = count($exam);
    return  $examCount;
}

function Get_total_cat(){
    $cat = Category::where('status',1)->get();
    $catCount = count($cat);
    return  $catCount;
}

function Get_total_student(){
    $student = student::where('status',1)->get();
    $stuCount = count($student);
    return  $stuCount;
}

function Get_total_feedback(){
    $feedback = feedback::get();
    $feedCount = count($feedback);
    return  $feedCount;
}


function fetch_quest_option_ans($id,$exam_option_number	){
    $options = question_option::where('exam_question_id',$id)->where('exam_option_number',$exam_option_number)->get();

    foreach($options as $option){
    
      return $option->question_option_title;
  
    }
    
}




 ?>