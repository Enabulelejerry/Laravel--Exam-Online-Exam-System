@extends('portal.portal_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
     <div class="page-content">

        <h6 class="mb-0 text-uppercase">
            MANAGE EXAM
        </h6>
            
        <hr/>

        <div class="card">
            
            <div class="card-body">

                <div class="row">

                    <div class="col-sm-6">
                        <h3>{{ $exam_title  }}</h3>
                    </div>

                    <div class="col-sm-6">
                        <h3> <span class="float-right" style="float:right">{{  date('d M,Y',strtotime($exam_date )) }}</span>  </h3>
                    </div>
                </div>

                <form action="{{ url('portal/exam_form_submit') }}" class="database_operation">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Enter Name</label>
                                {{ csrf_field() }}
                                
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="text" name="name" class="form-control mb-2" placeholder="Enter Name" required>
                             

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Email</label>
                        
                              <input type="email" name="email" class="form-control mb-2" placeholder="Enter Email"   required>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Mobile No</label>
                        
                              <input type="number" name="mobile_no" class="form-control mb-2" placeholder="Enter Mobile"   required>

                            </div>
                        </div>

                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Dob</label>
                        
                              <input type="date" name="dob" class="form-control mb-2"   required>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Gender</label>
                                <select name="gender" class="form-control mb-2">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Password</label>
                              <input type="password" name="password" class="form-control mb-2" placeholder="Enter Password"   required>

                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-info">Save</button>
            </form>
             </div>
            </div>
       

     </div>
 </div>


    
@endsection
