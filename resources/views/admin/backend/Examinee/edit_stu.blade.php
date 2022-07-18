@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            EDIT STUDENT DETAILS</h6>
            
        <hr/>
        
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card">
            
                    <div class="card-body">
                        <form action="{{ url('admin/edit_students_final') }}" class="database_operation">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Name</label>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" class="form-control mb-2"  value="{{ $student->id }}" required> 

                                        <input type="text" name="name" class="form-control mb-2"  value="{{ $student->name }}" required> 
    
                                    </div>
                                </div>
    
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Email</label>
                                        <input type="email" name="email" class="form-control mb-2"  required value="{{ $student->email }}"> 
    
                                    </div>
                                </div>
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Mobile No</label>
                                       
                                      
                                        <input type="number" name="mobile_no" class="form-control mb-2" value="{{ $student->mobile_no }}"  required> 
    
                                    </div>
                                </div>
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">DOB</label>
                                
                                      <input type="date" name="dob" class="form-control mb-2"  value="{{ $student->dob }}"  required>
    
                                    </div>
                                </div>
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Select Gender</label>
                                        <select name="gender" class="form-control" id="" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="Male"{{ $student->gender="Male" ? "selected" : "" }}>Male</option>
                                            <option value="Female" {{ $student->gender="Female" ? "selected" : "" }}>Female</option>
                                                
    
                                        </select>
                                        
    
                                    </div>
                                </div>
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Password</label>
                                    
                                        <input type="password" name="password" class="form-control mb-2" value="{{ $student->password }}"> 
    
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
