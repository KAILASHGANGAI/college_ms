<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\attendance;
use App\Http\Controllers\classcontroller;
use App\Http\Controllers\eventController;
use App\Http\Controllers\teacherConterller;
use App\Http\Controllers\staffConterller;
use App\Http\Controllers\librearyController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/admin','/admin/dashboard');
    Route::view('/log','log');
    Route::view('/layout','admin/layout');
    Route::view('/students','admin/students');
    Route::view('/add_students','admin/add_students');
    Route::view('/student_details','admin/student_details');
    Route::post('/add_students', [studentController::class,'addstudent']);
    Route::post('/update_student', [studentController::class,'update']);
    Route::get('/students', [studentController::class,'show']);
    Route::get('/add_students', [studentController::class,'look']);
    Route::get('/student_details/{id}', [studentController::class,'detail']);
    Route::get('/student_edit/{id}', [studentController::class,'edit']);
    Route::get('/student_delete/{id}', [studentController::class,'delete']);
    Route::view('/payment','admin/payment');
    Route::get('/payment',[paymentController::class,'show']);
    Route::view('/payment_bill','admin/payment_bill');
    Route::get('/payment_bill',[paymentController::class,'add']);
    Route::post('/payment_record',[paymentController::class,'add']);

    Route::get('/admin/payment',[paymentController::class,'ajaxrequest']);
    Route::post('/admin/payment',[paymentController::class,'ajaxrequestpost'])->name('ajaxrequest.post');

    Route::view('/attendance','admin/attendance');
    Route::get('/attendance',[attendance::class,'show']);

    Route::get('/admin/attendance',[attendance::class,'attendanceajax']);
    Route::post('/attendance',[attendance::class,'attendanceajaxpost'])->name('attendanceajax.post');
    Route::post('/saveattendance',[attendance::class,'saveattendance'])->name('saveajax.post');

    Route::view('/attendance_show','admin/attendance_show');
    Route::post('/attendance_show',[attendance::class,'showattendance']);
    Route::get('/detail_attendance/{id}',[attendance::class,'detail_attendance']);

    // event routes
    Route::view('/event_add','admin/event/event_add');
    Route::view('/event','admin/event/event');
    Route::get('/event',[eventController::class,'index']);
    Route::get('/edit/{id}',[eventController::class,'create']);

    Route::post('/event_add',[eventController::class,'store']);



    //end event route
    // class management
    Route::view('/class_manage','/admin/class/class');
    Route::view('/add_period','/admin/class/add_period');
    Route::get('/class_manage',[classcontroller::class,'show']);
    Route::get('/add_period',[classcontroller::class,'period']);
    Route::post('/add_period_save',[classcontroller::class,'save']);


    Route::post('/saveperiod_ajax',[classcontroller::class,'getperiod'])->name('saveperiod_ajax.post');


    Route::get('/admin/class/add_period', [classcontroller::class, 'ajaxRequest_p']);
    Route::post('/admin/class/add_period', [classcontroller::class, 'ajaxperiod'])->name('ajaxRequest_period.post');
    // teachers
    Route::view('/teachers','admin/teacher/teacher');
    Route::view('/add_teacher','admin/teacher/add_teacher');
    Route::view('/detail_teacher','admin/teacher/detail_teacher');
    Route::post('/add_teacher',[teacherConterller::class,'add']);
    Route::get('/teachers',[teacherConterller::class,'show']);
    Route::get('/detail_teacher/{id}',[teacherConterller::class,'detail']);
    Route::get('/delete_teacher/{id}',[teacherConterller::class,'delete']);
    Route::get('/edit_teacher/{id}',[teacherConterller::class,'edit']);
    Route::post('/update_teacher',[teacherConterller::class,'update'] );

    //staffs
    Route::view('/staff','admin/staff/staff');
    Route::view('/add_staff','admin/staff/add_staff');
    Route::view('/detail_staff','admin/staff/detail_staff');
    Route::post('/add_staff',[staffConterller::class,'add']);
    Route::get('/staff',[staffConterller::class,'show']);
    Route::get('/detail_staff/{id}',[staffConterller::class,'detail']);
    Route::get('/delete_staff/{id}',[staffConterller::class,'delete']);
    Route::get('/edit_staff/{id}',[staffConterller::class,'edit']);
    Route::post('/update_staff',[staffConterller::class,'update'] );

    //libreaty details
    Route::view('/libreary details','admin/libreary/libreary_show');
    Route::view('/add_books','admin/libreary/add_books');
    Route::get('/add_books', [librearyController::class,'show']);
    Route::post('/add_book_to', [librearyController::class,'add']);
    Route::get('/libreary details', [librearyController::class,'getdata']);
    Route::get('/edit_books/{id}', [librearyController::class,'edit']);
    Route::get('/delete_books/{id}', [librearyController::class,'delete']);
    Route::post('/update_books', [librearyController::class,'update']);
    // take and return
    Route::view('/take_books','admin/libreary/take_books');
    Route::view('/return_books','admin/libreary/return_books');
    Route::post('take_book_search', [librearyController::class, 'search']);
    Route::post('/addbooks_to', [librearyController::class, 'addbookto']);

    //return books
   Route::get('/return_books',[librearyController::class, 'return']) ;
   



});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();





