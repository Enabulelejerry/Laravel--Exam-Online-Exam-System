@extends('portal.portal_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
     <div class="page-content">

        <h6 class="mb-0 text-uppercase">
            STUDENT EXAM INFO
        </h6>
            
        <hr/>

        <div class="card">
            
            <div class="card-body">

                <div class="row">

                    <div class="col-sm-6">
                        <h3>{{ $exam_info->title  }}</h3>
                    </div>

                    <div class="col-sm-6">
                        <h3> <span class="float-right" style="float:right">{{  date('d M,Y',strtotime($exam_info->exam_date )) }}</span>  </h3>
                    </div>
                </div>

                <form action="{{ url('portal/student_exam_info_edit') }}" class="database_operation">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Enter Name</label>
                                {{ csrf_field() }}
                                
                                <input type="hidden" name="id" value="{{ $student_info->id }}">
                                <input type="text" name="name" class="form-control mb-2" value="{{ $student_info->name }}" required>
                             

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Email</label>
                        
                              <input type="email" name="email" class="form-control mb-2" value="{{ $student_info->email }}"   required>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Mobile No</label>
                        
                              <input type="number" name="mobile_no" class="form-control mb-2" value="{{ $student_info->mobile_no }}"   required>

                            </div>
                        </div>

                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Dob</label>
                        
                              <input type="date" name="dob" class="form-control mb-2" value="{{ $student_info->dob }}"  required>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Gender</label>
                                <select name="gender" class="form-control mb-2">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Male"{{ $student_info->gender="Male" ? "selected" : "" }}>Male</option>
                                    <option value="Female" {{ $student_info->gender="Female" ? "selected" : "" }}>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-2">Password</label>
                              <input type="password" name="password" class="form-control mb-2" value="{{ $student_info->password }}"   required>

                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-info">Update</button>
            </form>
             </div>
            </div>
       

     </div>
 </div>


    
@endsection
