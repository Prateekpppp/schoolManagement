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
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Cookie;


// Admin routes

Route::middleware(['admin_auth_check_middleware','custom_admin_session_middleware'])->group(function () {
    
    Route::prefix('principal')->group(function () {

        Route::get('/', [AdminDataController::class,'index'])->name('principal.index');
        
        // Student Attendance Module
        Route::post('/createStudentAttendance', [StudentAttendanceController::class,'create'])->name('principal.post.createStudentAttendance')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/studentAttendance', [StudentAttendanceController::class,'read'])->name('principal.pages.studentAttendance');

        // Staff Attendance Module
        Route::get('/staffAttendance', [StaffAttendanceController::class,'read'])->name('principal.pages.staffAttendance');

        // Task Module
        Route::get('/task', [TaskController::class,'task'])->name('principal.pages.task');

        Route::post('/createTask', [TaskController::class,'createTask'])->name('principal.post.createTask')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateStatus', [TaskController::class,'updateStatus'])->name('principal.get.updateStatus');

        Route::get('/updateTask', [TaskController::class,'updateTask'])->name('principal.pages.updateTask');

        // Salary Module
        Route::get('/staffSalary', [SalaryController::class,'staffSalary'])->name('principal.pages.staffSalary');

        Route::get('/salaryFilter', [SalaryController::class,'inventoryFilter'])->name('principal.pages.salaryFilter');

        // StudentRoute Module
        Route::get('/assignedStudentRoute', [StudentRouteController::class,'assignedStudentRoute'])->name('principal.pages.assignedStudentRoute');

        Route::get('/assignStudentRoute', [StudentRouteController::class,'assignStudentRoute'])->name('principal.pages.assignStudentRoute');

        Route::post('/createStudentRoute', [StudentRouteController::class,'createStudentRoute'])->name('principal.post.createStudentRoute')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateStudentRoute', [StudentRouteController::class,'updateStudentRoute'])->name('principal.pages.updateStudentRoute');

        // Staff Module
        
        Route::get('/updateStaff', [StaffController::class,'updateStaff'])->name('principal.pages.updateStaff');

        Route::post('/manageStaff', [StaffController::class,'manageStaff'])->name('principal.post.manageStaff')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/staffDetail/{id}', [StaffController::class,'staffDetail'])->name('principal.pages.staffDetail');

        // Student Module
        Route::get('/students', [StudentController::class,'students'])->name('principal.pages.students');
        
        Route::get('/inactiveStudents', [StudentController::class,'inactiveStudents'])->name('principal.pages.inactiveStudents');
        
        Route::get('/studentFilter', [StudentController::class,'studentFilter'])->name('principal.pages.studentFilter');
        
        Route::get('/allStudents', [StudentController::class,'allStudents'])->name('principal.get.allStudents');
        
        Route::get('/addStudent', [StudentController::class,'addStudent'])->name('principal.pages.addStudent');
        
        Route::post('/createStudent', [StudentController::class,'createStudent'])->name('principal.post.createStudent')->withoutMiddleware([VerifyCsrfToken::class]);
          
        Route::get('/updateStudent', [StudentController::class,'updateStudent'])->name('principal.pages.updateStudent');
        
        Route::get('/studentDetail/{id}', [StudentController::class,'studentDetail'])->name('principal.pages.studentDetail');
        
        Route::post('/studentDetailByEnrollNo', [StudentController::class,'studentDetailByEnrollNo'])->name('principal.post.studentDetailByEnrollNo')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/manageStudent', [StudentController::class,'manageStudent'])->name('principal.post.manageStudent')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Homework Module
        Route::get('/homework', [HomeworkController::class,'homework'])->name('principal.pages.homework');

        Route::get('/homeworkFilter', [HomeworkController::class,'homeworkFilter'])->name('principal.pages.homeworkFilter');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('principal.pages.addHomework');

        Route::get('/allHomework', [HomeworkController::class,'allHomework'])->name('principal.get.allHomework');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('principal.pages.addHomework');
        
        Route::get('/updateHomework', [HomeworkController::class,'updateHomework'])->name('principal.pages.updateHomework');
        
        Route::post('/createHomework', [HomeworkController::class,'createHomework'])->name('principal.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Student Homework Module
        Route::get('/studentHomework', [StudenthomeworkController::class,'homework'])->name('principal.pages.homework');

        Route::get('/studentHomeworkFilter', [StudenthomeworkController::class,'homeworkFilter'])->name('principal.pages.homeworkFilter');
        
        Route::get('/allStudentHomework', [StudenthomeworkController::class,'allHomework'])->name('principal.get.allHomework');
        
        Route::get('/addStudentHomework', [StudenthomeworkController::class,'addHomework'])->name('principal.pages.addHomework');
        
        Route::get('/updateStudentHomework', [StudenthomeworkController::class,'updateHomework'])->name('principal.pages.updateHomework');
        
        Route::post('/createStudentHomework', [StudenthomeworkController::class,'createHomework'])->name('principal.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Exam Module
        Route::get('/exam', [ExamController::class,'exam'])->name('principal.pages.exam');
        
        Route::get('/allExam', [ExamController::class,'allExam'])->name('principal.get.allExam');
        
        Route::post('/createExam', [ExamController::class,'createExam'])->name('principal.post.createExam')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateExam', [ExamController::class,'updateExam'])->name('principal.pages.updateExam');
        
    });
    
        // Post/Action requests end


});
