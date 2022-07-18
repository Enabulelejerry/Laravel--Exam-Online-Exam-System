@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            MANAGE CATEGORY</h6>
            
        <hr/>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus-circle"></i>Add Category</button>
       
        <!--category Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('admin/add_category') }}" class="database_operation">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter Category Name</label>
                                    {{ csrf_field() }}

                                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>

                </form>

                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
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
                                <th>Course Name</th>
                                <th>Status</th>
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                     
                            @foreach ( $category as $key => $cat )
                                 
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $cat['name'] }}</td>

                                
                                   @if ($cat['status']==1)
                                   <td> <a href="" data-id="{{ $cat['id'] }}" class="btn btn-success category_status">Enable</a></td>
                                   @else
                                   <td> <a href="" data-id="{{ $cat['id'] }}" class="btn btn-danger category_status">Disenable</a></td>
                                   @endif
                                
                                
                                <td>
                                    <a href="{{ url('admin/edit_category/'.$cat['id']) }}" class="btn btn-info">Edit</a>

                                    <a href="{{ url('admin/delete_category/'.$cat['id']) }}" class="btn btn-danger" id="delete">Delete</a>
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


    
@endsection
