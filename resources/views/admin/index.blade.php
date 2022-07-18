@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
     <div class="page-content">

             <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                 <div class="col">
                     <div class="card radius-10 bg-gradient-deepblue">
                      <div class="card-body">
                         <div class="d-flex align-items-center">
                             <h5 class="mb-0 text-white">{{ Get_total_exam() }}</h5>
                             <div class="ms-auto">
                               
                                 <i class="fadeIn animated fs-3 text-white bx bx-screenshot"></i>
                             </div>
                         </div>
                         <div class="progress my-3 bg-light-transparent" style="height:3px;">
                             <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="d-flex align-items-center text-white">
                             <p class="mb-0">Total Exam</p>
                             <a style="color:white" href="{{ route('manage_exam') }}" class="mb-0 ms-auto"><i class='bx bx-up-arrow-alt'></i></span></a>
                             
                         </div>
                     </div>
                   </div>
                 </div>
                 <div class="col">
                     <div class="card radius-10 bg-gradient-orange">
                     <div class="card-body">
                         <div class="d-flex align-items-center">
                             <h5 class="mb-0 text-white">{{ Get_total_cat() }}</h5>
                             <div class="ms-auto">
                                <i class="fadeIn animated fs-3 bx bx-detail text-white"></i>
                             </div>
                         </div>
                         <div class="progress my-3 bg-light-transparent" style="height:3px;">
                             <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="d-flex align-items-center text-white">
                             <p class="mb-0">Total Exam Category</p>
                             
                             <a style="color:white" href="{{ route('exam_category') }}" class="mb-0 ms-auto"><i class='bx bx-up-arrow-alt'></i></span></a>
                         </div>
                     </div>
                   </div>
                 </div>
                 <div class="col">
                     <div class="card radius-10 bg-gradient-ohhappiness">
                     <div class="card-body">
                         <div class="d-flex align-items-center">
                             <h5 class="mb-0 text-white">{{ Get_total_student() }}</h5>
                             <div class="ms-auto">
                                 <i class='bx bx-group fs-3 text-white'></i>
                             </div>
                         </div>
                         <div class="progress my-3 bg-light-transparent" style="height:3px;">
                             <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="d-flex align-items-center text-white">
                             <p class="mb-0">Examinee</p>
                             <a style="color:white" href="{{ route('manage_examinee') }}" class="mb-0 ms-auto"><i class='bx bx-up-arrow-alt'></i></span></a>
                         </div>
                     </div>
                 </div>
                 </div>
                 <div class="col">
                     <div class="card radius-10 bg-gradient-ibiza">
                      <div class="card-body">
                         <div class="d-flex align-items-center">
                             <h5 class="mb-0 text-white">{{ Get_total_feedback() }}</h5>
                             <div class="ms-auto">
                                 <i class='bx bx-envelope fs-3 text-white'></i>
                             </div>
                         </div>
                         <div class="progress my-3 bg-light-transparent" style="height:3px;">
                             <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="d-flex align-items-center text-white">
                             <p class="mb-0">FeedBack</p>
                             <a style="color:white" href="{{ route('all_feeback') }}" class="mb-0 ms-auto"><i class='bx bx-up-arrow-alt'></i></span></a>
                         </div>
                     </div>
                  </div>
                 </div>
             </div><!--end row-->
      
 </div>


    
@endsection
