@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            MANAGE STUDENT</h6>
            
        <hr/>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus-circle"></i> Add Student</button>
       
        <!--category Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/add_new_students') }}" class="database_operation">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter Name</label>
                                    {{ csrf_field() }}
                                  
                                    <input type="text" name="name" class="form-control mb-2" placeholder="Enter name" required> 

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter Email</label>
                                    <input type="email" name="email" class="form-control mb-2" placeholder="Enter Email" required> 

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter Mobile No</label>
                                   
                                  
                                    <input type="number" name="mobile_no" class="form-control mb-2" placeholder="Enter Mobile Number" required> 

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">DOB</label>
                            
                                  <input type="date" name="dob" class="form-control mb-2"   required>

                                </div>
                            </div>


                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Gender </label>
                                    <select name="gender" class="form-control" id="" required>
                                        <option value="" disabled selected>Select</option>
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>

                                    </select>
                                    

                                </div>
                            </div>


{{-- 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Exam </label>
                                    <select name="exam" class="form-control" id="" required>

                                        <option value="" disabled selected>Select</option>

                                        @foreach ($exams as $exam )

                                        <option value="{{ $exam['id'] }}">{{ $exam['title'] }}</option>
                                            
                                        @endforeach

                                    </select>
                                    

                                </div>
                            </div> --}}

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter Password</label>
                                
                                    <input type="password" name="password" class="form-control mb-2" placeholder="Enter Password" required> 

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
                                <th>Name</th>
                                <th>DOB</th>
                                <th>gender</th>
                                <th>Email</th>
                                <th>password</th>
                                
                                <th>Status</th>
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $student )

                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $student['name'] }}</td>
                                <td>{{ $student['dob'] }}</td>
                                <td>{{ $student['gender'] }}</td>
                                <td>{{ $student['email'] }}</td>
                                <td>{{ $student['password'] }}</td>
                                    
                                    @if ($student['status']==1)
                                    <td> <a href="" data-id="{{ $student['id'] }}" class="btn btn-success stu_status">Enable</a></td>
                                    @else
                                    <td> <a href="" data-id="{{ $student['id'] }}" class="btn btn-danger stu_status">Disenable</a></td>
                                    @endif

                                    <td>
                                        <a href="{{ url('admin/edit_examinee/'.$student['id']) }}" class="btn btn-info">Edit</a>
    
                                        <a href="{{ url('admin/delete_examinee/'.$student['id']) }}" class="btn btn-danger" id="delete">Delete</a>
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
