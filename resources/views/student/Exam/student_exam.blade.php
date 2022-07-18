@extends('student.student_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">

       <h6 class="mb-0 text-uppercase">
           STUDENT EXAM
       </h6>
           
       <hr/>

       <div class="card">
           
           <div class="card-body">

            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th  width="5%">SN</th>
                        <th>Exam Title</th>
                        {{-- <th>Status</th> --}}
                        {{-- <th>Result</th> --}}
                        <th>Exam Date</th>
                        
                        <th width="25%">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                      
                 @foreach ($student_info as $key => $info )
                 <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $info->title }}</td>
                    
                      {{-- @if (strtotime($info->exam_date) < strtotime(date('Y-m-d')))
                        <td> <span class="btn btn-success">Exam Is Completed</span> </td>
                        @elseif (strtotime($info->exam_date) == strtotime(date('Y-m-d')))
                        <td><span class="btn btn-danger">Exam Is Running</span> </td>
                          @else
                          <td>
                            <span class="btn btn-info">Pending</span>
                          </td>
                        @endif --}}
                
{{--                     
                      @if (strtotime($info->exam_date) < strtotime(date('Y-m-d')))
                      <td><a href="{{ url('student/get_result/'.$info->exam_id) }}" class="btn btn-info">View Result</a></td>
                      @elseif (strtotime($info->exam_date) == strtotime(date('Y-m-d')))
                      <td><a href="{{ url('student/get_result/'.$info->exam_id) }}" class="btn btn-info">View Result</a></td>
                      @elseif (strtotime($info->exam_date) > strtotime(date('Y-m-d')))
                      <td><a href="{{ url('student/get_result/'.$info->exam_id) }}" class="btn btn-info">View Result</a></td>
                      @else
                      <td></td>
                      @endif --}}
                    

                    <td>{{ $info->exam_date }}</td>

                    @if ($countatt > 0)
                    <td><a href="{{ url('student/get_result/'.$info->exam_id) }}" class="btn btn-info">View Result</a></td>
                    @else
                    @if (strtotime($info->exam_date) < strtotime(date('Y-m-d')))
                    <td></td>
                    @elseif (strtotime($info->exam_date) == strtotime(date('Y-m-d')))
                    <td> <a href="{{ url('student/join_exam/'.$info->exam_id) }}" class="btn btn-warning" id="takeexam">Take Exam</a></td>
                   @else
                   <td></td>
                    @endif
                    @endif
                   
                   
                  
                 </tr>

                 @endforeach
                     
             
                    
          
                </tbody>
               
            </table>
         
            </div>
           </div>
      

    </div>
</div>

<script>
  

</script>


    
@endsection
