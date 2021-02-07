<?php

use App\Models\student;
use App\Models\Examination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\portalOperation;
use App\Http\Controllers\portalController;
use App\Http\Controllers\StudentOperation;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {

//      // Test database connection
//     try {
//         DB::connection()->getPdo();
//         echo "Connected successfully to: " . DB::connection()->getDatabaseName();
//     } catch (\Exception $e) {
//       die("Could not connect to the database. Please check your configuration. error:" . $e );
//     }

//     return view('welcome');
// });



//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// AdminController
// Route::get('/admin',[AdminController::class,'index']);
Route::group(['middleware' => ['auth']],function(){
    Route::get('admin/category',[AdminController::class,'category']);
    Route::post('admin/add_category',[AdminController::class,'add_category']);
    Route::get('admin_edit_category/{id}',[AdminController::class,'edit_category']);
    Route::post('admin/update_category',[AdminController::class,'update_category']);
    Route::get('admin/delete_category/{id}',[AdminController::class,'delete_category']);
    Route::get('admin/category_status/{id}',[AdminController::class,'category_status']);
    Route::get('admin/category_status/{id}',[AdminController::class,'category_status']);
    // Manage Exams
    Route::get('/manage_exams',[AdminController::class,'exam']);
    Route::post('exam/add_exam',[AdminController::class,'add_exam']);
    Route::get('exam_status/{id}',[AdminController::class,'exam_status']);
    Route::get('exam_edit/{id}',[AdminController::class,'edit_exam']);
    Route::get('add_question/{id}',[AdminController::class,'Add_question']);
    Route::post('exam/add_new_question',[AdminController::class,'add_new_question']);
    Route::get('question_status/{id}',[AdminController::class,'question_status']);
    Route::get('question_edit/{id}',[AdminController::class,'edit_question']);
    Route::post('exam/update_question',[AdminController::class,'update_question']);
    Route::get('question/delete/{id}',[AdminController::class,'delete_question']);
    Route::post('exam/update_exam',[AdminController::class,'update_exam']);
    Route::get('exam/delete/{id}',[AdminController::class,'delete_exam']);
    // Students
    Route::get('/students',[AdminController::class,'student']);
    Route::post('/student/add_student',[AdminController::class,'add_student']);
    Route::get('/student_status/{id}',[AdminController::class,'student_status']);
    Route::get('student_edit/{id}',[AdminController::class,'edit_student']);
    Route::post('student/update_student',[AdminController::class,'update_student']);
    Route::get('student/delete/{id}',[AdminController::class,'delete_student']);
    // portal
    Route::get('admin/portal',[AdminController::class,'portal']);
    Route::post('admin/add_portal',[AdminController::class,'add_portal']);
    Route::get('admin_edit_portal/{id}',[AdminController::class,'edit_portal']);
    Route::post('admin/update_portal',[AdminController::class,'update_portal']);
    Route::get('admin/delete_portal/{id}',[AdminController::class,'delete_portal']);
    Route::get('admin/portal_status/{id}',[AdminController::class,'portal_status']);
    // Result
    Route::get('admin/results',[AdminController::class,'result']);
});

// portal
Route::get('portal/sign_in',[portalController::class,'login']);
Route::get('portal/sign_up',[portalController::class,'register']);
Route::post('portal/signin',[portalController::class,'authenticate']);
Route::post('portal/signup',[portalController::class,'addUsers']);
//  portal operation
Route::group(['middleware' => 'auth_portal'], function () {
    Route::get('portal/dashboard',[portalOperation::class,'dashboard'])->middleware('auth_portal');
    Route::get('registration_form/{id}',[portalOperation::class,'register_for_exam']);
    Route::post('portal/registration_form_submit',[portalOperation::class,'registration']);
    Route::get('receipt_print/{id}',[portalOperation::class,'get_Stu']);
    Route::get('portal/edit_form',[portalOperation::class,'updateForm']);
    Route::post('portal/student_info',[portalOperation::class,'studentEditInfo']);
    Route::post('/portal/update_student_form',[portalOperation::class,'update_student_form']);
});
Route::get('portal/logout',[portalOperation::class,'logout']);
// student
Route::get('/',[StudentController::class,'login']);
Route::post('student/login_submit',[StudentController::class,'authenticate_student']);
Route::match(['get', 'post'], '/student/register', function () {
    $exam = Examination::where('status',1)->orderBy('id','desc')->get()->toArray();
    return view('student.register',['exams'=> $exam]);
});
Route::match(['get', 'post'], '/student/register_submit', [StudentController::class,'Registration']);
Route::get('student/dashboard',[StudentOperation::class,'dashboard']);
// Route::group(['middleware' => 'auth_student'], function (){
    //student operation
    Route::get('student/exams',[StudentOperation::class,'exam']);
    Route::get('join_exam/{id}',[StudentOperation::class,'join_exam'])->name('start.exam');
    Route::post('student/submit_exam',[StudentOperation::class,'submitExam']);
    Route::get('show_result/{id}',[StudentOperation::class,'show_result']);
//});
Route::get('student/logout',[StudentOperation::class,'logout']);

