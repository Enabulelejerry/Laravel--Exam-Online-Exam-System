@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="authentication-reset-password  align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card-body">
                                
                         
                                <form method="post" action="{{ route('passwordupdate') }}" >
                                    @csrf
                                    <div class="p-5">
                                        <div class="text-start">
                                            <center>
                                                <img src="{{ asset('backend/images/standard-log.png') }}" width="80" alt="">
                                            </center>
                                            
                                        </div>
                                        <h4 class="mt-5 font-weight-bold">Generate New Password</h4>
                                        @if ($errors->any())
                                        @foreach ( $errors->all() as $error )
                                        <ul>
                                            <li class="text-danger">{{ $error }}</li>
                                        </ul>
                                           
                                        @endforeach
                                        
                                      @endif

                                      @if (session('error'))
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>{{ session('error') }}</strong> 
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>
                                      @endif
                                        <div class="mb-3 mt-5">
                                            <label class="form-label">Old password</label>
                                            <input type="password" class="form-control" name="oldpassword" id="current_password" placeholder="Enter new password" >
                                        </div>
                                  

                                
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password">
                
                                    </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" />
                                        </div>
                                        <div class="">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5 w-100" name="" id="" value="Change Password">
                                        </div>
                                    </div>
                                </form>
                               
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <!--end page wrapper -->
 <!--start overlay-->
 <div class="overlay toggle-icon"></div>
 <!--end overlay-->
 <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
 <!--End Back To Top Button-->

    
@endsection
