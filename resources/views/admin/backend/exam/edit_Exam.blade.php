@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            EDIT EXAM</h6>
            
        <hr/>
        
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card">
            
                    <div class="card-body">
                        <form action="{{ url('admin/edit_exam_sub') }}" class="database_operation">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Enter Title</label>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" class="form-control" value="{{ $exam->id }}" >
                                        <input type="text" name="title" class="form-control mb-2" placeholder="Enter Exam Title" value="{{ $exam->title }}" required>
                                    
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Exam Date</label>
                                
                                      <input type="date" name="exam_date" class="form-control mb-2" value="{{ $exam->exam_date }}"  required>
    
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Select Exam Duration</label>
                                        <select name="duration" class="form-control mb-2" id="" required>
    
                                            <option value="" disabled selected>Select</option>
                                            
                                             <option value="300" {{ $exam->duartion='300' ? "selected" : "" }}>5 Mintues</option>
                                             <option value="600" {{ $exam->duartion='600' ? "selected" : "" }}>10 Mintues</option>
                                             <option value="1200" {{ $exam->duartion='1200' ? "selected" : "" }}>20 Mintues</option>
                                             <option value="1800" {{ $exam->duartion='1800' ? "selected" : "" }}>30 Mintues</option>
                                             <option value="360" {{ $exam->duartion='3600' ? "selected" : "" }}>60 Mintues</option>

                                        </select>
                                        
    
                                    </div>
                                </div>
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-2">Select Exam Category</label>
                                        <select name="exam_category" class="form-control" id="" required>
    
                                            <option value="" disabled selected>Select</option>
    
                                            @foreach ($category as $cat )
    
                                            <option value="{{ $cat['id'] }}" {{  $cat['id']=$exam->category ? 'selected':'' }}>{{ $cat['name'] }}</option>
                                                
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
