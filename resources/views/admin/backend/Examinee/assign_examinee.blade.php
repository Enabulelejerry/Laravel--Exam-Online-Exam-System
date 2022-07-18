@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            ASSIGN STUDENT TO EXAM</h6>
            
        <hr/>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus-circle"></i> Assign Student</button>
       
        <!--category Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/add_assign_students') }}" class="database_operation">
                        <div class="row">
                            {{ csrf_field() }}
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Student Name</label>
                                    <select name="student_id" class="form-control" id="" required>
                                        <option value="" disabled selected>Select</option>
                                             @foreach ($students as $student )

                                             <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                 
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
                                             <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                                        
                                             @endforeach

                                    </select>
                                    

                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>

                </form>
                                </div>
                            </div>
                       
            </div>
        </div>

        <div class="card">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th  width="5%">SN</th>
                                <th>Student Name</th>
                                <th>Exam</th>
                                <th>Exam Date</th>
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigns as $key => $assign )
                                 <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $assign->name }}</td>
                                    <td>{{ $assign->title }}</td>
                                    <td>{{ $assign->exam_date }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit_assign/'.$assign['id']) }}" class="btn btn-info">Edit</a>
    
                                        <a href="{{ url('admin/delete_assign/'.$assign['id']) }}" class="btn btn-danger" id="delete">Delete</a>
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
