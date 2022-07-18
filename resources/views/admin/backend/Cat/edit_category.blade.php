@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            EDIT CATEGORY</h6>
            
        <hr/>
        
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card">
            
                    <div class="card-body">
                            <form action="{{ url('admin/edit_new_category') }}" class="database_operation">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Category Name</label>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" class="form-control" value="{{ $category->id }}" >
                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Enter Category Name" required>
        
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info mt-2">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
      
        </div>
       
    </div>
  
 </div>


    
@endsection
