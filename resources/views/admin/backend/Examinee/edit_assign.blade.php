@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            EDIT ASSIGN STUDENT </h6>
            
        <hr/>
        
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card">
            
                    <div class="card-body">
                        <form action="{{ url('admin/update_assign') }}" class="database_operation">
                            <div class="row">
                                {{ csrf_field() }}
                                
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="{{ $editass->id }}">
                                    <div class="form-group">
                                        <label class="mb-2">Student Name</label>
                                        <select name="student_id" class="form-control mb-2" id="" required>
                                            <option value="" disabled selected>Select</option>
                                                 @foreach ($students as $student )
    
                                                 <option value="{{ $student->id }}" {{ $editass->student_id=$student->id? "selected" : "" }}>{{ $student->name }}</option>
                                                     
                                                 @endforeach
    
                                        </select>
                                        
    
                                    </div>
                                </div>
    
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Select Exam</label>
                                        <select name="exam_id" class="form-control" id="" required>
                                            <option value="" disabled selected>Select</option>
                                                 @foreach ($exams as $exam )
                                                 <option value="{{ $exam->id }}" {{ $editass->exam_id=$exam->id? "selected" : "" }} >{{ $exam->title }}</option>
                                            
                                                 @endforeach
    
                                        </select>
                                        
    
                                    </div>
                                </div>
    
    
                            </div>
    
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
      
        </div>
       
    </div>
  
 </div>


    
@endsection
