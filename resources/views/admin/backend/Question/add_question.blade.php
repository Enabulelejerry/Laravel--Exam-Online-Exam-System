@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            MANAGE  QUESTIONS</h6>
            
        <hr/>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus-circle"></i> Add Questions</button>
       
        <!--category Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add  Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('admin/store_question') }}" class="database_operation">
                            {{ csrf_field() }}
                        <div class="row">
                        

                

                               <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Exam </label>
                                    <select name="exam_id" id="exam_id" class="form-control mb-2" id="" required>

                                        <option value="" disabled selected>Select</option>

                                        @foreach ($exams as $exam )
                                        <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                                        @endforeach

                        
                                    </select>
                                    

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter Question </label>
                                     <input type="text" name="question_title"  class="form-control mb-2" placeholder="Enter Exam Question">
                                    

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter option 1 </label>
                                     <input type="text" name="option1"  class="form-control mb-2" placeholder="Enter Option1">
                                    

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter option 2 </label>
                                     <input type="text" name="option2"  class="form-control mb-2" placeholder="Enter Option2">
                                    

                                </div>
                            </div>



                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter option 3 </label>
                                     <input type="text" name="option3"  class="form-control mb-2" placeholder="Enter Option3">
                                    

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Enter option 4 </label>
                                     <input type="text" name="option4"  class="form-control mb-2" placeholder="Enter Option4">
                                    

                                </div>
                            </div>



                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Answer </label>
                                    <select name="exam_question_answer" class="form-control mb-2" id="" required>

                                        <option value="" disabled selected>Select</option>
                                         <option value="1"> Option 1</option>
                                         <option value="2">Option 2</option>
                                         <option value="3">Option 3</option>
                                         <option value="4">Option 4</option>
                                    </select>
                                    

                                </div>
                            </div>


                        
                            {{-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="mb-2">Select Exam Category</label>
                                    <select name="exam_category" class="form-control" id="" required>

                                        <option value="" disabled selected>Select</option>

                                        @foreach ($category as $cat )

                                        <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                            
                                        @endforeach

                                    </select>
                                    

                                </div>
                            </div> --}}


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
                                <th>Exam</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                         @foreach ( $exam_questions as $key => $question )
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $question->title }}</td>
                            <td>{{ $question->exam_question_title }}</td>
                            <td>Option {{ $question->exam_question_answer }}</td>

                            @foreach ( fetch_quest_option($question->id)  as $option )  
                            <td>{{ $option->question_option_title }}</td>
                       @endforeach

                         <td>
                            <a href="{{ url('admin/edit_question/'.$question->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('admin/delete_question/'.$question->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
