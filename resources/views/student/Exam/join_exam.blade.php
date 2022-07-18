@extends('student.student_master')
        
@section('admin')
<style class="text/css">
.question_option>li{
    list-style:none;
}

</style>

@php

  $stu_id =request()->session()->get('id') ;
  $new_exam_id =request()->session()->get('new_exam_id') ;
  //$stu_id = Session::get('id');
        $stu_attmpt = App\Models\exam_question_attempt::where('student_id',$stu_id)->where('exam_id',$new_exam_id)->get();
        if(count($stu_attmpt)>0){
            $notification = array(
                'message' => 'Exam Taken',
                'alert-type' => 'error'
              );
        
              return redirect()->route('student.exam')->with($notification); 
        }

  
@endphp


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">

       <h6 class="mb-0 text-uppercase">
           STUDENT EXAM
       </h6>

       <?php
            $exam_id  = $exam_id;
            $cat_id = $all_questions['0']['cat_id'];    
        ?>
       
       <hr/>

       <div class="card">
           
           <div class="card-body">
                 <div class="row">
        
                    <div class="col-md-3">
                         {{-- <div id="exam_timer" data-timer="120" style=""></div>     --}}
                         <h4 id="new_exam_timer"></h4>
                         {{-- <div id="new_exam_timer"></div>     --}}
                    </div>
                    
                 </div>
            </div>
           </div>

           <div class="row">
            <div class="col-md-8">
                <div id="single_question_area">

                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('backend/images/avatars/avatar3.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{ $stu_info->name }}</h4>
                                <p class="text-secondary mb-1">{{ $stu_info->email }}</p>
                                <p class="text-muted font-size-sm">{{ $stu_info->mobile_no }}</p>
                              
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>
           </div>

          

           {{-- @foreach ($all_questions as $key => $question)


           <div class="card mt-5">
            <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <p> <b>{{ $key+1 }}. {{ $question->exam_question_title }}</b> </p>
                        @foreach ( fetch_quest_option($question->id)  as $option ) 	
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" name="{{ $option->exam_option_number }}"  id="flexRadioDefault{{ $option->exam_option_number }}">
                            <label class="form-check-label" for="flexRadioDefault{{ $option->exam_option_number }}">{{ $option->question_option_title }}</label>
                        </div>  
                        
                        <div class="col-md-6 mb-4">
						{{-- <div class="radio">
							<label><b>'.$temp_array[$temp_count].'.&nbsp;&nbsp;</b><input type="radio" name="option_1" class="answer_option" data-question_id="'.$row['exam_subject_question_id'].'" data-id="'.$count.'" '.$is_checked.'> '.$sub_row["question_option_title"].'</label>
						</div> --}}
					{{-- </div>
                        @endforeach
                    </div>
                  </div>
             </div>
            </div>
               
           @endforeach --}}

                    
           {{-- <div class="col-sm-12 mt-4">
                                
            <button class="btn btn-info btn-block w-100">Submit</button>                 
        </div> 
       --}}

    </div>
</div>


<script>



$(document).ready(function(){
    var total_time = "<?php echo $exams->duration; ?>";
    var exam_id = "<?php echo $exam_id; ?>";
    var cat_id = "<?php echo $cat_id; ?>";
    var spent_total = "<?php echo $exam_answer->spent_total; ?>";

    console.log(total_time,spent_total);

    if(spent_total == 0){
        startTicker(total_time);
    }else{

            startTicker(spent_total); 
 
    }



function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var setcounter = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + " Minutes :" + seconds + "Sec";
        
        if (--timer < 0) {
            timer = duration;
            end_time_exam(this,timer);
        }else{
                update_timer(timer);
        }
    }, 1000);
}
function end_time_exam(setcounter,timer) {
    clearInterval(setcounter);
    console.log('end exam', timer);
    location.replace('/student/get_result/'+exam_id);
}
function startTicker(examMinute) {
    var new_exam_timer = document.querySelector('#new_exam_timer');
    startTimer(examMinute, new_exam_timer);
}

function update_timer(timer){
    // ajax func
    var total_spend = timer + 2; 
    console.log('Time remaining: '+total_spend);
    var exam_id = "<?php echo $exam_id; ?>";   
        $.ajax({
            url:"{{ route('exam.update_time')}}",
            method:"POST",
            data:{exam_id:exam_id,total_spend:total_spend,"_token": "{{ csrf_token() }}"},
            success:function()
            {

            }
        });
}
function update_timer_end(){
    // ajax func
    var total_spend = 0; 
    console.log('Time remaining: '+total_spend);
    var exam_id = "<?php echo $exam_id; ?>";   
        $.ajax({
            url:"{{ route('exam.update_time')}}",
            method:"POST",
            data:{exam_id:exam_id,total_spend:total_spend,"_token": "{{ csrf_token() }}"},
            success:function()
            {

            }
        });
}
    load_question('',exam_id,cat_id); 

    function load_question(question_id='',exam_id,cat_id)
     {
            $.ajax({
            url:"{{ route('exam.action')}}",
			method:"GET",
			data:{exam_id:exam_id,cat_id:cat_id,question_id:question_id},
			success:function(data)
			{
				$('#single_question_area').html(data);
			}
		})

        } 

        $(document).on('click', '.next', function(){
        var question_id = $(this).attr('id');
        load_question(question_id,exam_id,cat_id);
    });

    $(document).on('click', '.previous', function(){
        var question_id = $(this).attr('id');
        load_question(question_id,exam_id,cat_id);
    });

    $(document).on('click', '#answer_option', function(){
        var question_id = $(this).data('question_id');
        var answer_option = $(this).data('id');   
        $.ajax({
            url:"{{ route('exam.answer_input')}}",
            method:"POST",
            data:{question_id:question_id, answer_option:answer_option, exam_id:exam_id, cat_id:cat_id,"_token": "{{ csrf_token() }}"},
            success:function()
            {

            }
        });
    });


  

       
   

})
</script>

<script>


    
    $("#exam_timer").TimeCircles({
        "animation": "smooth",
        "bg_width": 1.2,
        "fg_width": 0.1,
        "circle_bg_color": "#eee",
        "time": {
            "Days":
            {
                "show": false
            },
            "Hours":
            {
                "show": false
            },
            "Minutes": {
                "text": "Minutes",
                "color": "#ffc107",
                "show": true
            },
            "Seconds": {
                "text": "Seconds",
                "color": "#007bff",
                "show": true
            }
        }
    });


    $("#exam_timer").TimeCircles().addListener(function(unit, value, total) {
        if(total < 1)
        {
            $("#exam_timer").TimeCircles().destroy();
            alert('Exam Time Completed');
          
        }
    });




</script> 


    
@endsection
