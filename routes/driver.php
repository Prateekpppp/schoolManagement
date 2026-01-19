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
use Illuminate\Support\Facades\Cookie;


// Admin routes

Route::middleware(['admin_auth_check_middleware','custom_admin_session_middleware'])->group(function () {
    
    Route::prefix('staff')->group(function () {
        
        // Salary Module
        Route::get('/staffSalary', [SalaryController::class,'staffSalary'])->name('staff.pages.staffSalary');

        Route::get('/salaryFilter', [SalaryController::class,'inventoryFilter'])->name('staff.pages.salaryFilter');

        // StudentRoute Module
        Route::get('/assignedStudentRoute', [StudentRouteController::class,'assignedStudentRoute'])->name('staff.pages.assignedStudentRoute');

        Route::get('/assignStudentRoute', [StudentRouteController::class,'assignStudentRoute'])->name('staff.pages.assignStudentRoute');

        Route::post('/createStudentRoute', [StudentRouteController::class,'createStudentRoute'])->name('staff.post.createStudentRoute')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateStudentRoute', [StudentRouteController::class,'updateStudentRoute'])->name('staff.pages.updateStudentRoute');

        // Staff Module
        
        Route::get('/updateStaff', [StaffController::class,'updateStaff'])->name('staff.pages.updateStaff');

        Route::post('/manageStaff', [StaffController::class,'manageStaff'])->name('staff.post.manageStaff')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/staffDetail/{id}', [StaffController::class,'staffDetail'])->name('staff.pages.staffDetail');

        // Student Module
        Route::get('/students', [StudentController::class,'students'])->name('staff.pages.students');
        
        Route::get('/inactiveStudents', [StudentController::class,'inactiveStudents'])->name('staff.pages.inactiveStudents');
        
        Route::get('/studentFilter', [StudentController::class,'studentFilter'])->name('staff.pages.studentFilter');
        
        Route::get('/allStudents', [StudentController::class,'allStudents'])->name('staff.get.allStudents');
        
        Route::get('/addStudent', [StudentController::class,'addStudent'])->name('staff.pages.addStudent');
        
        Route::post('/createStudent', [StudentController::class,'createStudent'])->name('staff.post.createStudent')->withoutMiddleware([VerifyCsrfToken::class]);
          
        Route::get('/updateStudent', [StudentController::class,'updateStudent'])->name('staff.pages.updateStudent');
        
        Route::get('/studentDetail/{id}', [StudentController::class,'studentDetail'])->name('staff.pages.studentDetail');
        
        Route::post('/studentDetailByEnrollNo', [StudentController::class,'studentDetailByEnrollNo'])->name('staff.post.studentDetailByEnrollNo')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/manageStudent', [StudentController::class,'manageStudent'])->name('staff.post.manageStudent')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Homework Module
        Route::get('/homework', [HomeworkController::class,'homework'])->name('staff.pages.homework');

        Route::get('/homeworkFilter', [HomeworkController::class,'homeworkFilter'])->name('staff.pages.homeworkFilter');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('staff.pages.addHomework');

        Route::get('/allHomework', [HomeworkController::class,'allHomework'])->name('staff.get.allHomework');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('staff.pages.addHomework');
        
        Route::get('/updateHomework', [HomeworkController::class,'updateHomework'])->name('staff.pages.updateHomework');
        
        Route::post('/createHomework', [HomeworkController::class,'createHomework'])->name('staff.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Student Homework Module
        Route::get('/studentHomework', [StudenthomeworkController::class,'homework'])->name('staff.pages.homework');

        Route::get('/studentHomeworkFilter', [StudenthomeworkController::class,'homeworkFilter'])->name('staff.pages.homeworkFilter');
        
        Route::get('/allStudentHomework', [StudenthomeworkController::class,'allHomework'])->name('staff.get.allHomework');
        
        Route::get('/addStudentHomework', [StudenthomeworkController::class,'addHomework'])->name('staff.pages.addHomework');
        
        Route::get('/updateStudentHomework', [StudenthomeworkController::class,'updateHomework'])->name('staff.pages.updateHomework');
        
        Route::post('/createStudentHomework', [StudenthomeworkController::class,'createHomework'])->name('staff.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Transaction Module
        Route::get('/receipt', [FeeController::class,'receipt'])->name('staff.pages.receipt');
        
        Route::get('/paymentHistory', [TransactionController::class,'paymentHistory'])->name('staff.pages.paymentHistory');
       
        Route::get('/print_invoice', [TransactionController::class,'print_invoice'])->name('staff.pages.print_invoice');

        Route::get('/print_receipt', [TransactionController::class,'print_receipt'])->name('staff.pages.print_receipt');

        // Exam Module
        Route::get('/exam', [ExamController::class,'exam'])->name('staff.pages.exam');
        
        Route::get('/allExam', [ExamController::class,'allExam'])->name('staff.get.allExam');
        
        Route::post('/createExam', [ExamController::class,'createExam'])->name('staff.post.createExam')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateExam', [ExamController::class,'updateExam'])->name('staff.pages.updateExam');
        
        // Job Module
        Route::get('/jobs', [JobController::class,'jobs'])->name('staff.pages.jobs');
        
        Route::get('/allJobs', [JobController::class,'allJobs'])->name('staff.get.allJobs');
        
        Route::get('/addJobs', function () {
            return view('admin.pages.addJobs');
        })->name('staff.pages.addJobs');
        
        Route::post('/createJob', [JobController::class,'createJob'])->name('staff.post.createJob')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateJob', [JobController::class,'updateJob'])->name('staff.pages.updateJob');
        Route::get('/applicants', [ApplicantController::class,'applicants'])->name('staff.pages.applicants');
        
        Route::get('/contact', [ContactController::class,'contact'])->name('staff.pages.contact');
        
        Route::get('/setting', function () {
            return view('admin.pages.setting');
        })->name('staff.pages.setting');

        Route::get('/notice', [NoticeController::class,'notice'])->name('staff.pages.notice');
        
        Route::get('/allNotice', [NoticeController::class,'allNotice'])->name('staff.get.allNotice');
        
        Route::get('/addNotice', [NoticeController::class,'addNotice'])->name('staff.pages.addNotice');
        
        Route::post('/createNotice', [NoticeController::class,'createNotice'])->name('staff.post.createNotice')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/banner', [BannerController::class,'banner'])->name('staff.pages.banner');
        
        Route::get('/allBanner', [BannerController::class,'allBanner'])->name('staff.get.allBanner');
        
        Route::get('/addBanner', [BannerController::class,'addBanner'])->name('staff.pages.addBanner');
        
        Route::post('/createBanner', [BannerController::class,'createBanner'])->name('staff.post.createBanner')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/gallery', [GalleryController::class,'gallery'])->name('staff.pages.gallery');
        
        Route::get('/allGallery', [GalleryController::class,'allGallery'])->name('staff.get.allGallery');
        
        Route::get('/addGallery', [GalleryController::class,'addGallery'])->name('staff.pages.addGallery');
        
        Route::post('/createGallery', [GalleryController::class,'createGallery'])->name('staff.post.createGallery')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/updateAppdata', [AppdataController::class,'updateAppdata'])->name('staff.post.updateAppdata')->withoutMiddleware([VerifyCsrfToken::class]);


        // delete operation
        Route::post('/delete', [AppdataController::class,'delete'])->name('staff.post.delete')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::post('/inactive', [AppdataController::class,'inactive'])->name('staff.post.inactive')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::post('/restore', [AppdataController::class,'restore'])->name('staff.post.restore')->withoutMiddleware([VerifyCsrfToken::class]);        


        // Post Requests

        
    });
    
        // Post/Action requests end


});
