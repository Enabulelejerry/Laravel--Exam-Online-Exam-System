<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Portal\PortalController;
use App\Http\Controllers\Portal\PortalOperation;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\student\StudentOperation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*---------------- Admin Route --------------- */
Route::get('admin/login',[AdminController::class,'Index'])->name('login_from');
    
Route::post('admin/login/owner',[AdminController::class, 'Login'])->name('admin.login');

Route::group(['middleware' => ['admin']],function(){

    Route::prefix('admin')->group(function (){
   
        Route::get('dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard');
    
        // Route::get('dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

        /*---------------- passwordchange Route --------------- */
        Route::get('/changepassword',[PasswordController::class, 'ChangePassword'])->name('changepassword');

        Route::post('/updatepassword',[PasswordController::class, 'UpdatePassword'])->name('passwordupdate');
        /*---------------- Category Route --------------- */

          /*---------------- passwordchange Route --------------- */
          Route::get('/view/profile',[ProfileController::class, 'ViewProfile'])->name('view_profile');

          Route::post('update/profile',[ProfileController::class, 'UpdateProfile'])->name('edit_profile');
          /*---------------- Category Route --------------- */
        
    /*---------------- Category Route --------------- */
        Route::get('/exam/category/view',[AdminController::class, 'ExamCategory'])->name('exam_category');
    
        Route::post('/add_category',[AdminController::class,'add_category']);
    
        Route::get('/delete_category/{id}',[AdminController::class,'DeleteCat']);
    
        Route::get('edit_category/{id}',[AdminController::class,'EditCat']);
    
        Route::post('/edit_new_category',[AdminController::class,'UpdateCat']);
    
        Route::get('category_status/{id}',[AdminController::class,'CatStatus']);
    
        
    /*---------------- Exam Route --------------- */
    
        Route::get('/exam/view',[AdminController::class, 'ExamView'])->name('manage_exam');
    
        Route::post('/add_new_exam',[AdminController::class,'AddExam']);
    
        Route::get('exam_status/{id}',[AdminController::class,'ExamStatus']);
    
        Route::get('delete_exam/{id}',[AdminController::class,'DeleteExam']);
        Route::get('edit_exam/{id}',[AdminController::class,'EditExam']);
    
        Route::post('/edit_exam_sub',[AdminController::class,'UpdateExam']);
        
       /*---------------- Question Route --------------- */
       Route::get('/add_question',[AdminController::class,'AddQuestion'])->name('add_question');
       Route::post('/store_question',[AdminController::class,'StoreQuestion']);
       Route::get('/edit_question/{id}',[AdminController::class,'EditQuestion']);
       Route::post('/update_question',[AdminController::class,'UpdateQuestion']);
       Route::get('delete_question/{id}',[AdminController::class,'DeleteQuestion']);
    
         /*---------------- Examinee Route --------------- */
        Route::get('/examinee/view',[AdminController::class, 'ExamineeView'])->name('manage_examinee');
    
        Route::get('/examinee/assign/view',[AdminController::class, 'ExamineeAssignView'])->name('assign_examinee');
    
        Route::post('/add_new_students',[AdminController::class,'AddStudent']);
    
        Route::get('stu_status/{id}',[AdminController::class,'StuStatus']);
    
        Route::get('delete_examinee/{id}',[AdminController::class,'DeleteExaminee']);
    
        Route::get('edit_examinee/{id}',[AdminController::class,'EditExaminee']);
    
        Route::post('/edit_students_final',[AdminController::class,'UpdateStudent']);
    
        Route::post('/add_assign_students',[AdminController::class,'AssignStudent']);
    
        Route::get('/logout',[AdminController::class,'Logout'])->name('admin_logout');
    
    
         /*----------------Assign Examinee Route --------------- */
         Route::get('/examinee/assign/view',[AdminController::class, 'ExamineeAssignView'])->name('assign_examinee');
         Route::get('edit_assign/{id}',[AdminController::class, 'EditAssign']);
         Route::post('/update_assign',[AdminController::class, 'UpdateAssign']);
         Route::get('delete_assign/{id}',[AdminController::class, 'DeleteAssign']);
    
        
    /*---------------- Portal Route --------------- */
    
    Route::get('/portal/view',[AdminController::class, 'PortalView'])->name('manage_portal');
    
    Route::post('/add_new_portal',[AdminController::class,'AddPortal']);
    
    Route::get('portal_status/{id}',[AdminController::class,'PortalStatus']);
    
    Route::get('delete_portal/{id}',[AdminController::class,'DeletePortal']);
    
    Route::get('edit_portal/{id}',[AdminController::class,'EditPortal']);
    
    Route::post('/update_portal',[AdminController::class,'UpdatePortal']);
    /*---------------- Exam Rank Route --------------- */
    Route::get('result/view',[AdminController::class, 'ResultView'])->name('manage_rank_result');
    Route::get('show_ranking_result/{id}',[AdminController::class,'ShowRankResult']);

     /*---------------- All Feedback Route --------------- */
    
     Route::get('/feedback/view',[AdminController::class, 'FeedbackView'])->name('all_feeback');
    
    });

});






/*---------------- End Admin Route --------------- */



/*---------------- Portal Route --------------- */

Route::prefix('portal')->group(function (){
    Route::get('/login',[PortalController::class,'Index'])->name('portal_from');
    Route::post('owner/login',[PortalController::class,'Login'])->name('pot_login');
    Route::get('/dashboard',[PortalOperation::class,'Dashbaord'])->name('portal.dashboard');
    Route::get('exam_form/{id}',[PortalOperation::class,'ExamForm']);
    Route::post('exam_form_submit/',[PortalOperation::class,'ExamFormSubmit']);
    Route::get('print/{id}',[PortalOperation::class,'FormPrint']);
    Route::get('/update_form',[PortalOperation::class,'UpdateForm'])->name('portal.update_form');
    Route::get('student_exam_info/',[PortalOperation::class,'SearchStuInfo']);
    Route::post('student_exam_info_edit/',[PortalOperation::class,'UpdateStuInfo']);
    Route::get('/logout',[PortalOperation::class,'Logout'])->name('portal_logout');

 
});



/*---------------- Student Route --------------- */

Route::prefix('student')->group(function (){
    Route::get('/login',[StudentController::class,'Index'])->name('student_from');
    Route::post('owner/login',[StudentController::class,'Login'])->name('student_login');
    Route::get('/dashboard',[StudentController::class,'Dashbaord'])->name('student.dashboard');
    Route::get('/exam',[StudentOperation::class,'Exam'])->name('student.exam');
    Route::get('/logout',[StudentOperation::class,'Logout'])->name('student_logout');
    Route::get('/join_exam/{id}',[StudentOperation::class,'JoinExam']);
    Route::get('/join_quiz_action',[StudentOperation::class,'QuizAction'])->name('exam.action');
    Route::post('/submit/answer_option',[StudentOperation::class,'SubmitAnswer'])->name('exam.answer_input');
    Route::post('/update/time',[StudentOperation::class,'UpdateTimer'])->name('exam.update_time');
    Route::get('get_result/{id}',[StudentOperation::class,'GetResult']);
    Route::get('submit_exam/{id}',[StudentOperation::class,'SubmitExam']);
    Route::get('send/feedback',[StudentOperation::class,'SendFeedback'])->name('feedback');
    Route::post('send/feedback/stote',[StudentOperation::class,'StoreFeedback'])->name('send_back');

 

 
});



Route::get('/', function () {

    return view('student.student_login');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
