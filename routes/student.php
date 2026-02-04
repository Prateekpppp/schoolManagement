<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDataController;
use App\Http\Controllers\AppdataController;
use App\Http\Controllers\DatasessionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\StudenthomeworkController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverRouteController;
use App\Http\Controllers\ScRouteController;
use App\Http\Controllers\StudentRouteController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryCategoryController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\FeeinvoiceController;
use App\Http\Controllers\StudentAttendanceController;
use Illuminate\Support\Facades\Cookie;


// Admin routes

Route::middleware(['admin_auth_check_middleware','custom_admin_session_middleware'])->group(function () {
    
    Route::prefix('student')->group(function () {
       
        Route::get('/dashboard', [AdminDataController::class,'index'])->name('student.index');

        // Student Attendance Module

        Route::get('/attendance', [StudentAttendanceController::class,'attendanceById'])->name('student.pages.attendance');

        // Student Module

        Route::get('/inactiveStudents', [StudentController::class,'inactiveStudents'])->name('student.pages.inactiveStudents');
        
        Route::get('/studentFilter', [StudentController::class,'studentFilter'])->name('student.pages.studentFilter');
        
        Route::get('/allStudents', [StudentController::class,'allStudents'])->name('student.get.allStudents');
        
        Route::get('/addStudent', [StudentController::class,'addStudent'])->name('student.pages.addStudent');
        
        Route::post('/createStudent', [StudentController::class,'createStudent'])->name('student.post.createStudent')->withoutMiddleware([VerifyCsrfToken::class]);
          
        Route::get('/updateStudent', [StudentController::class,'updateStudent'])->name('student.pages.updateStudent');
        
        Route::get('/studentDetail', [StudentController::class,'studentDetail'])->name('student.pages.studentDetail');
        
        Route::post('/studentDetailByEnrollNo', [StudentController::class,'studentDetailByEnrollNo'])->name('student.post.studentDetailByEnrollNo')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/manageStudent', [StudentController::class,'manageStudent'])->name('student.post.manageStudent')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Homework Module
        Route::get('/homework', [HomeworkController::class,'homework'])->name('student.pages.homework');

        Route::get('/homeworkFilter', [HomeworkController::class,'homeworkFilter'])->name('student.pages.homeworkFilter');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('student.pages.addHomework');

        Route::get('/allHomework', [HomeworkController::class,'allHomework'])->name('student.get.allHomework');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('student.pages.addHomework');
        
        Route::get('/updateHomework', [HomeworkController::class,'updateHomework'])->name('student.pages.updateHomework');
        
        Route::post('/createHomework', [HomeworkController::class,'createHomework'])->name('student.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Student Homework Module
        Route::get('/studentHomework', [StudenthomeworkController::class,'homework'])->name('student.pages.homework');

        Route::get('/studentHomeworkFilter', [StudenthomeworkController::class,'homeworkFilter'])->name('student.pages.homeworkFilter');
        
        Route::get('/allStudentHomework', [StudenthomeworkController::class,'allHomework'])->name('student.get.allHomework');
        
        Route::get('/addStudentHomework', [StudenthomeworkController::class,'addHomework'])->name('student.pages.addHomework');
        
        Route::get('/updateStudentHomework', [StudenthomeworkController::class,'updateHomework'])->name('student.pages.updateHomework');
        
        Route::post('/createStudentHomework', [StudenthomeworkController::class,'createHomework'])->name('student.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Transaction Module

        Route::get('/feeInvoice', [FeeinvoiceController::class,'feeInvoice'])->name('student.pages.feeInvoice');
        
        Route::get('/receipt', [FeeController::class,'receipt'])->name('student.pages.receipt');
        
        Route::get('/paymentHistory', [TransactionController::class,'paymentHistory'])->name('student.pages.paymentHistory');
       
        Route::get('/print_invoice', [TransactionController::class,'print_invoice'])->name('student.pages.print_invoice');

        Route::get('/print_receipt', [TransactionController::class,'print_receipt'])->name('student.pages.print_receipt');

        // Exam Module
        Route::get('/exam', [ExamController::class,'exam'])->name('student.pages.exam');
        
        Route::get('/allExam', [ExamController::class,'allExam'])->name('student.get.allExam');
        
        Route::post('/createExam', [ExamController::class,'createExam'])->name('student.post.createExam')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateExam', [ExamController::class,'updateExam'])->name('student.pages.updateExam');
        
        
    });
    
        // Post/Action requests end


});
