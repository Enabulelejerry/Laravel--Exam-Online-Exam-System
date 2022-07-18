@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            MANAGE EXAM</h6>
            
        <hr/>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus-circle"></i> Add Exam</button>
       
        <!--category Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('admin/add_new_exam') }}" class="database_operation">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter Title</label>
                                    {{ csrf_field() }}
                                  

                                    <input type="text" name="title" class="form-control mb-2" placeholder="Enter Exam Title" required>
                                 

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Exam Date</label>
                            
                                  <input type="date" name="exam_date" class="form-control mb-2"   required>

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Exam Duration</label>
                                    <select name="duration" class="form-control mb-2" id="" required>

                                        <option value="" disabled selected>Select</option>

                                         <option value="300">5 Mintues</option>
                                         <option value="600">10 Mintues</option>
                                         <option value="1200">20 Mintues</option>
                                         <option value="1800">30 Mintues</option>
                                         <option value="3600">60 Mintues</option>

                                    </select>
                                    

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Exam Category</label>
                                    <select name="exam_category" class="form-control" id="" required>

                                        <option value="" disabled selected>Select</option>

                                        @foreach ($category as $cat )

                                        <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                            
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Exam Date</label>
                                   

                          

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
                                <th>Title</th>
                                <th>Category</th>
                                <th>Exam Date</th>
                                <th>Exam Duration</th>
                                <th>Status</th>
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                        
                            @foreach ( $exams as $key => $exam )
                                 
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $exam['title'] }}</td>
                                <td>{{ $exam['cat_name'] }}</td>
                                <td>{{ $exam['exam_date'] }}</td>
                                <?php  
                                 
                                 $exam_duration = $exam['duration']/60
                                
                                ?>
                                <td>{{ $exam_duration }} Minutes</td>

                                
                                   @if ($exam['status']==1)
                                   <td> <a href="" data-id="{{ $exam['id'] }}" class="btn btn-success exam_status">Disable</a></td>
                                   @else
                                   <td> <a href="" data-id="{{ $exam['id'] }}" class="btn btn-danger exam_status">Enable</a></td>
                                   @endif
                                
                                
                                <td>
                                    <a href="{{ url('admin/edit_exam/'.$exam['id']) }}" id="delete" class="btn btn-info">Edit</a>
                                    <a href="{{ url('admin/delete_exam/'.$exam['id']) }}" class="btn btn-danger"  >Delete</a>
                                    {{-- <a href="{{ url('admin/add_question/'.$exam['id']) }}" class="btn btn-primary" >Add Questions</a> --}}
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
