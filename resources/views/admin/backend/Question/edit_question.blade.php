@extends('admin.admin_master')
        
@section('admin')


 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">
            UPDATE  QUESTIONS</h6>     
        <hr/>
        <div class="card">
            <div class="card-body">

                <form action="{{ url('admin/update_question') }}" class="database_operation">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                             <input type="hidden" name="id"  class="form-control mb-2" value="{{ $exam_question->id }}" >
                        </div>
                    </div>
                      
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="mb-2">Exam </label>
                            <input type="text" name="exam_id"  class="form-control mb-2"  value="{{ $exam_question->title }}" disabled >
                            
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="mb-2">Enter Question </label>
                             <input type="text" name="question_title"  class="form-control mb-2"  value="{{ $exam_question->exam_question_title }}" >
                            

                        </div>
                    </div>

                    @foreach ($qst_options as $option )
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="mb-2">Enter option {{ $option->exam_option_number }} </label>
                             <input type="text" name="option{{ $option->exam_option_number }}"  class="form-control mb-2" value="{{ $option->question_option_title }}" >
                        </div>
                    </div>
                    @endforeach

             
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="mb-2">Select Answer </label>
                            <select name="exam_question_answer" class="form-control mb-2" >
                                <option value="" disabled selected>Select</option>
                                 <option value="1" {{ $exam_question->exam_question_answer=1 ? 'selected':"" }}> Option 1</option>
                                 <option value="2" {{ $exam_question->exam_question_answer=2 ? 'selected':"" }}>Option 2</option>
                                 <option value="3" {{ $exam_question->exam_question_answer=3 ? 'selected':"" }}>Option 3</option>
                                 <option value="4" {{ $exam_question->exam_question_answer=4 ? 'selected':"" }}>Option 4</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>

        </form>
             
            </div>
        </div>
        
        
        </div>
       
    </div>
  
 </div>


    
@endsection
