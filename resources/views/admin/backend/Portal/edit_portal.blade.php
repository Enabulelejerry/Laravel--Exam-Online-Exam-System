@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            EDIT PORTAL DETAILS</h6>
            
        <hr/>
        
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card">
            
                    <div class="card-body">
                        <form action="{{ url('admin/update_portal') }}" class="database_operation">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Name</label>
                                        {{ csrf_field() }}

                                        <input type="hidden" name="id" class="form-control mb-2" value="{{ $portal->id }}">
                                      
                                        <input type="text" name="name" class="form-control mb-2" value="{{ $portal->name }}">  
    
                                    </div>
                                </div>
    
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Email</label>
                                        <input type="email" name="email" class="form-control mb-2" placeholder="Enter Email" required value="{{ $portal->email }}">
    
                                    </div>
                                </div>
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Mobile No</label>
                                        <input type="number" name="mobile_no" class="form-control mb-2" placeholder="Enter Mobile Number" required value="{{ $portal->mobile_no }}">
    
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Password</label>
                                        <input type="password" name="password" class="form-control mb-2" placeholder="Enter Password" required value="{{ $portal->password }}"> 
    
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
