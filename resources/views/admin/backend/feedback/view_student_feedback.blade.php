@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            All Student FeedBack</h6>
            
        <hr/>

    
        <div class="card">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th  width="5%">SN</th>
                                <th>Student</th>
                                <th>FeedBack</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                        
                            @foreach ( $allfeebacks as $key => $feeback )
                                 <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $feeback->fb_as }}</td>
                                    <td>{{ $feeback->fb_msg }}</td>
                                    <?php  
                                     $date = date('Y-m-d', strtotime($feeback->created_at));
                                    ?>
                                    <td>{{ $date }}</td>
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
