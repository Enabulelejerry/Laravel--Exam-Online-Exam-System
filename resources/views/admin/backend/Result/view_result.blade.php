@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            Ranking By Exam</h6>
            
        <hr/>

     
       
      
        <div class="card">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th  width="5%">SN</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                        
                            @foreach ( $exams as $key => $exam )
                                 
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $exam['title'] }}</td>
                                <td>{{ $exam['cat_name'] }}</td>
                                
                                <td>
                                    <a href="{{ url('admin/show_ranking_result/'.$exam['id']) }}" class="btn btn-success">View</a>
                                 
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
