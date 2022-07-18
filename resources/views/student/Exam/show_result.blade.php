
@extends('student.student_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">

       <h6 class="mb-0 text-uppercase">
           {{ $stu_info->name }} EXAM Result for {{ $exam->title }}
       </h6>
           
       <hr/>
  
       <div class="row">
        <div class="col-md-6">
            <div class="card">
                 
                <div class="card-body">
                    <h3>Basic Information</h3>
                    <div class="table-responsive">
                       <table  class="table table-striped table-bordered">
                           <thead>
                               <tr>  
                                   <th>Name</th> 
                                   <th>{{ $stu_info->name }}</th> 
                               </tr>
       
                               <tr>  
                                   <th>Email</th> 
                                   <th>{{ $stu_info->email }}</th> 
                               </tr>
       
                               <tr>  
                                   <th>DoB</th> 
                                   <th>{{ $stu_info->dob }}</th> 
                               </tr>
   
                               <tr>  
                                  <th>Exam Name</th> 
                                  <th>{{ $exam->title }}</th> 
                              </tr>

                              
                              <tr>  
                                <th>Exam Date</th> 
                                <th>{{ $exam->exam_date }}</th> 
                            </tr>
                           </thead>
                         
                          
                       </table>  
                       
                   </div>  


                    <h2>Exam Information</h2>
                    @if (count($all_questions) == 0 )
                        <p>You have not yet answered any question for this Exam</p>
                    @else
                    <div class="table-responsive">
                        <table  class="table table-striped table-bordered">
                            <thead>
                                <tr>  
                                    <th>No Of Question Passed</th> 
                                    <th>{{ count($Examscore) }}</th> 
                                </tr>
        
                                <tr>  
                                    <th>No Of Question Failed</th> 
                                    <th>{{ $failed_question }}</th> 
                                </tr>
        
                                <tr>  
                                    <th>Total Mark</th> 
                                    <th>
                                       {{ count($Examscore) }} / {{ count($all_questions) }}
                                   </th> 
                                </tr>
   
                                <tr>  
                                   <th>Percentage Score %</th> 
                                   <th>    {{round(count($Examscore)/ count($all_questions) *100,2)}}</th> 
                               </tr>
                            </thead>
                          
                           
                        </table>  
                        
                    </div>
                     
                    @endif
                
                
              
                 </div>
                </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Your Answer's</h5>
                   
                    <table id="example2" class="align-middle mb-0 table table-borderless table-striped table-hover">

                       @foreach ($all_questions as $key => $value )

                       <tr>
                           <td class="ml-5">
                            <b><p>{{ $key +1  }} .)</b>  {{ $value->exam_question_title }}</p></b>

                            <label for="" >
                                @if ($value->answer_option != $value->exam_question_answer)
                                <span style="color:red;margin-left:20px">{{ fetch_quest_option_ans($value->question_id,$value->answer_option) }}</span>
                                @else
                                <span class="text-success"  style="margin-left:20px">{{ fetch_quest_option_ans($value->question_id,$value->answer_option) }}</span>
                                @endif
                            </label> 
                       </tr>
                           
                       @endforeach

                    </table>
                    {{-- {!! $all_questions->links() !!} --}}
                   
    
                </div>
    
             </div>
        </div>
       </div>

    
      

    </div>
</div>


<script>

  </script>
    
@endsection

