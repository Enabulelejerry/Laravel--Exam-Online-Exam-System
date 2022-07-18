@extends('portal.portal_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
     <div class="page-content">

        <h6 class="mb-0 text-uppercase">
            SEARCH USER TO UPDATE
        </h6>
            
        <hr/>

        <div class="card">
            
            <div class="card-body">
               
                <form action="{{ url('portal/student_exam_info') }}" method="get">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Mobile No</label>
                              <input type="number" name="mobile_no" class="form-control mb-2" placeholder="Enter Mobile Number"   required>
                            </div>
                        </div>
        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Dob</label>
                              <input type="date" name="dob" class="form-control mb-2" required>
                            </div>
                        </div>
        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Select Exam</label>
                                <select name="exam" class="form-control">
                                <option selected disabled>Select</option>
                                @foreach ($exams as $exam )
                                <option value="{{ $exam->id }}" >{{ $exam->title }}</option>
                                @endforeach
                                </select>
                                
                            </div>
                        </div>
        
                        <div class="col-sm-12 mt-2">
                            <div class="form-group">
                                <button  class="btn btn-info">   
                                    Search
                                </button>
                            </div>
                        </div>
        
                      </div>
                </form>

            
              

             </div>
            </div>
       

     </div>
 </div>


    
@endsection
