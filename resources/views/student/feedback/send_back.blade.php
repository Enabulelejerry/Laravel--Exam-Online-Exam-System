@extends('student.student_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">

       <h6 class="mb-0 text-uppercase">
          Submit Feeback
       </h6>
           
       <hr/>
        
       <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
           
                <div class="card-body">
                
                 <h6>Send Feedback As</h6>
     
                 <form  method="post" action="{{ route('send_back') }}">
                    @csrf
                     <div class="form-check">
                         <input class="form-check-input" type="radio" name="name" id="flexRadioDefault1" value="{{ $stu_info->name }}">
                         <label class="form-check-label" for="flexRadioDefault1">{{ $stu_info->name }}</label>
                     </div>
                     <div class="form-check">
                         <input class="form-check-input" type="radio" name="name" id="flexRadioDefault2" value="Anonymous" checked>
                         <label class="form-check-label" for="flexRadioDefault2">Anonymous</label>
                     </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                            <label class="mb-2">FeedBack</label>
                          <textarea name="fb_msg" class="form-control" id="" cols="30" rows="10" placeholder="Input Your Feedback Here" ></textarea>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Submit</button>
                 </form>
                
              
                 </div>
                </div>
           
     
         </div>
        </div>

        
       </div>
     
</div>


    
@endsection
