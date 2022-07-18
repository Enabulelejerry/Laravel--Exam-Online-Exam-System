@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <div>
            <h6 class="mb-0 text-uppercase">
                Ranking By Exam</h6>   
                <h6 class="mb-3">Exam Name : {{ $selEx->title }} </h6>   
                <span class="border" style="padding:10px;color:black;background-color: yellow;">Excellence</span>
                <span class="border" style="padding:10px;color:white;background-color: green;">Very Good</span>
                <span class="border" style="padding:10px;color:white;background-color: blue;">Good</span>
                <span class="border" style="padding:10px;color:white;background-color: red;">Failed</span>
                <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">Not Answering</span>

        </div>
      

        <hr/>

     
       
      
        <div class="card">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th  width="5%">SN</th>
                                <th>Student Name</th>
                                <th>Score / Over</th>
                                <th width="25%">Percentage</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                        
                            @foreach ( $selStudent as $key => $student )
                                 
                            <?php
                               $attmept = Get_student_attempt($student->id,$exam_id);
                            $correctscore =  Get_get_student_score($student->id,$exam_id);
                            $totalquestion =  Get_total_exam_question($student->id,$exam_id);
                            if($totalquestion==0){
                              $precent = "Answered No Question";
                            }elseif ( $attmept==0) {
                                $precent = "Answered No Question";
                            }
                            
                            else{
                              $precent = $correctscore/$totalquestion*100;
                            }


                          ?>
                            <tr style="<?php
                              if($attmept == 0){
                                echo "background-color: #E9ECEE;color:black";
                              } elseif ($totalquestion==0) {
                                echo "background-color: #E9ECEE;color:black";
                              } elseif ($precent >= 90) {
                                echo "background-color: yellow;";
                              }elseif ($precent >= 80) {
                                echo "background-color: green;color:white";
                              }elseif ($precent >= 75) {
                                echo "background-color: blue;color:white";
                              }else{
                                echo "background-color: red;color:white";
                              }
                            ?>" >
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $student['name'] }}</td>
                                <td>{{ Get_get_student_score($student->id,$exam_id) }}   / {{ Get_total_exam_question($student->id,$exam_id) }}</td>
                             
                                <td>
                                    {{ $precent }} 
                                 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                    
                </div>
            </div>
        </div>
        
        
        </div>
       
    </div>
  
 </div>


    
@endsection
