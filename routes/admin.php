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


// Admin routes

Route::middleware(['admin_auth_middleware','custom_admin_session_middleware'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/login', function () {
            return view('admin.pages.login');
        })->name('admin.login');
        
        Route::post('login', [AdminAuthController::class,'login'])->name('admin.auth.login');

    });

});

Route::middleware(['admin_auth_check_middleware','custom_admin_session_middleware'])->group(function () {
    
    Route::prefix('admin')->group(function () {
        
        // Vehicle Module
        Route::get('/vehicle', [VehicleController::class,'driver'])->name('admin.pages.vehicle');

        Route::get('/vehicleFilter', [VehicleController::class,'staffFilter'])->name('admin.pages.vehicleFilter');

        Route::get('/allVehicle', [VehicleController::class,'allDriver'])->name('admin.get.allVehicle');

        Route::get('/addVehicle', [VehicleController::class,'addDriver'])->name('admin.pages.addVehicle');

        Route::post('/createVehicle', [VehicleController::class,'createDriver'])->name('admin.post.createVehicle')->withoutMiddleware([VerifyCsrfToken::class]);

        Route::get('/updateVehicle', [VehicleController::class,'updateDriver'])->name('admin.pages.updateVehicle');

        Route::post('/manageVehicle', [VehicleController::class,'manageDriver'])->name('admin.post.manageVehicle')->withoutMiddleware([VerifyCsrfToken::class]);

        // Driver Module
        Route::get('/driver', [DriverController::class,'driver'])->name('admin.pages.driver');
        
        Route::get('/driverFilter', [DriverController::class,'driverFilter'])->name('admin.pages.driverFilter');
        
        Route::get('/allDriver', [DriverController::class,'allDriver'])->name('admin.get.allDriver');
        
        Route::get('/addDriver', [DriverController::class,'addDriver'])->name('admin.pages.addDriver');
        
        Route::post('/createDriver', [DriverController::class,'createDriver'])->name('admin.post.createDriver')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateDriver', [DriverController::class,'updateDriver'])->name('admin.pages.updateDriver');

        Route::post('/manageDriver', [DriverController::class,'manageDriver'])->name('admin.post.manageDriver')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/driverDetail/{id}', [DriverController::class,'driverDetail'])->name('admin.pages.driverDetail');
        // Logout Route
        Route::get('/logout', function () {
            Session::flush();
            return redirect()->route('admin.login');
        })->name('admin.logout');

        Route::get('/', [AdminDataController::class,'index'])->name('admin.index');

        // Year Session Module
        Route::get('/dataSession', [DatasessionController::class,'dataSession'])->name('admin.pages.dataSession');
        
        Route::get('/allDatasession', [DatasessionController::class,'allDatasession'])->name('admin.get.allDatasession');
        
        Route::get('/addDatasession', [DatasessionController::class,'addDatasession'])->name('admin.pages.addDatasession');
        
        Route::post('/createDatasession', [DatasessionController::class,'createDatasession'])->name('admin.post.createDatasession')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/changeSession/{session_name}', [DatasessionController::class,'changeSession'])->name('admin.pages.changeSession');

        // Section Module
        Route::get('/section', [SectionController::class,'section'])->name('admin.pages.section');
        
        Route::get('/allSection', [SectionController::class,'allSection'])->name('admin.get.allSection');
        
        Route::get('/addSection', [SectionController::class,'addSection'])->name('admin.pages.addSection');
        
        Route::post('/createSection', [SectionController::class,'createSection'])->name('admin.post.createSection')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::get('/manageSection/{id}', [SectionController::class,'manageSection'])->name('admin.pages.manageSection')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::post('/getSectionsByClass', [SectionController::class,'getSectionsByClass'])->name('admin.post.getSectionsByClass')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        // Classes Module
        Route::get('/classes', [ClassesController::class,'classes'])->name('admin.pages.classes');
        
        Route::get('/allClasses', [ClassesController::class,'allClasses'])->name('admin.get.allClasses');
        
        Route::get('/addClass', [ClassesController::class,'addClass'])->name('admin.pages.addClass');
        
        Route::post('/createClass', [ClassesController::class,'createClass'])->name('admin.post.createClass')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/manageClass/{id}', [ClassesController::class,'manageClass'])->name('admin.pages.manageClass');
        
        Route::post('/updateClass', [ClassesController::class,'updateClass'])->name('admin.post.updateClass')->withoutMiddleware([VerifyCsrfToken::class]);  

        Route::post('/remove_cSection', [ClassesController::class,'remove_cSection'])->name('admin.post.remove_cSection')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/remove_cSubject', [ClassesController::class,'remove_cSubject'])->name('admin.post.remove_cSubject')->withoutMiddleware([VerifyCsrfToken::class]);

        // Subject Module
        Route::get('/subject', [SubjectController::class,'subject'])->name('admin.pages.subject');
        
        Route::get('/allSubject', [SubjectController::class,'allSubject'])->name('admin.get.allSubject');
        
        Route::get('/addSubject', [SubjectController::class,'addSubject'])->name('admin.pages.addSubject');
        
        Route::post('/createSubject', [SubjectController::class,'createSubject'])->name('admin.post.createSubject')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/editSubject/{id}', [SubjectController::class,'editSubject'])->name('admin.pages.editSubject');
        
        Route::post('/removeClass', [SubjectController::class,'removeClass'])->name('admin.post.removeClass')->withoutMiddleware([VerifyCsrfToken::class]);

        // Staff Module
        Route::get('/staff', [StaffController::class,'staff'])->name('admin.pages.staff');
        
        Route::get('/staffFilter', [StaffController::class,'staffFilter'])->name('admin.pages.staffFilter');
        
        Route::get('/allStaff', [StaffController::class,'allStaff'])->name('admin.get.allStaff');
        
        Route::get('/addStaff', [StaffController::class,'addStaff'])->name('admin.pages.addStaff');
        
        Route::post('/createStaff', [StaffController::class,'createStaff'])->name('admin.post.createStaff')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateStaff', [StaffController::class,'updateStaff'])->name('admin.pages.updateStaff');

        Route::post('/manageStaff', [StaffController::class,'manageStaff'])->name('admin.post.manageStaff')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/staffDetail/{id}', [StaffController::class,'staffDetail'])->name('admin.pages.staffDetail');

        // Student Module
        Route::get('/students', [StudentController::class,'students'])->name('admin.pages.students');
        
        Route::get('/studentFilter', [StudentController::class,'studentFilter'])->name('admin.pages.studentFilter');
        
        Route::get('/allStudents', [StudentController::class,'allStudents'])->name('admin.get.allStudents');
        
        Route::get('/addStudent', [StudentController::class,'addStudent'])->name('admin.pages.addStudent');
        
        Route::post('/createStudent', [StudentController::class,'createStudent'])->name('admin.post.createStudent')->withoutMiddleware([VerifyCsrfToken::class]);
          
        Route::get('/updateStudent', [StudentController::class,'updateStudent'])->name('admin.pages.updateStudent');
        
        Route::get('/studentDetail/{id}', [StudentController::class,'studentDetail'])->name('admin.pages.studentDetail');
        
        Route::post('/studentDetailByEnrollNo', [StudentController::class,'studentDetailByEnrollNo'])->name('admin.post.studentDetailByEnrollNo')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Fee Module
        Route::get('/feeHead', [FeeController::class,'feeHead'])->name('admin.pages.feeHead');
          
        Route::get('/feeHeadFilter', [FeeController::class,'feeHeadFilter'])->name('admin.pages.feeHeadFilter');
        
        Route::get('/allFeeHead', [FeeController::class,'allFeeHead'])->name('admin.get.allFeeHead');
        
        Route::post('/createFeeHead', [FeeController::class,'createFeeHead'])->name('admin.post.createFeeHead')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateFeeHead', [FeeController::class,'updateFeeHead'])->name('admin.pages.updateFeeHead');
        
        Route::get('/generateFee', [FeeController::class,'generateFee'])->name('admin.pages.generateFee');
        
        Route::get('/filterGenerateFee', [FeeController::class,'filterGenerateFee'])->name('admin.pages.filterGenerateFee');
        
        Route::post('/assignFee', [FeeController::class,'assignFee'])->name('admin.post.assignFee')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/generatedFee', [FeeController::class,'generatedFee'])->name('admin.pages.generatedFee');
        
        Route::post('/collectFee', [FeeController::class,'collectFee'])->name('admin.post.collectFee')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Homework Module
        Route::get('/homework', [HomeworkController::class,'homework'])->name('admin.pages.homework');

        Route::get('/homeworkFilter', [HomeworkController::class,'homeworkFilter'])->name('admin.pages.homeworkFilter');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('admin.pages.addHomework');

        Route::get('/allHomework', [HomeworkController::class,'allHomework'])->name('admin.get.allHomework');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('admin.pages.addHomework');
        
        Route::get('/updateHomework', [HomeworkController::class,'updateHomework'])->name('admin.pages.updateHomework');
        
        Route::post('/createHomework', [HomeworkController::class,'createHomework'])->name('admin.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Student Homework Module
        Route::get('/studentHomework', [StudenthomeworkController::class,'homework'])->name('admin.pages.homework');

        Route::get('/studentHomeworkFilter', [StudenthomeworkController::class,'homeworkFilter'])->name('admin.pages.homeworkFilter');
        
        Route::get('/allStudentHomework', [StudenthomeworkController::class,'allHomework'])->name('admin.get.allHomework');
        
        Route::get('/addStudentHomework', [StudenthomeworkController::class,'addHomework'])->name('admin.pages.addHomework');
        
        Route::get('/updateStudentHomework', [StudenthomeworkController::class,'updateHomework'])->name('admin.pages.updateHomework');
        
        Route::post('/createStudentHomework', [StudenthomeworkController::class,'createHomework'])->name('admin.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Transaction Module
        Route::get('/receipt', [FeeController::class,'receipt'])->name('admin.pages.receipt');
        
        Route::get('/print_invoice/{id}', [TransactionController::class,'print_invoice'])->name('admin.pages.print_invoice');

        Route::get('/print_receipt/{id}', [TransactionController::class,'print_receipt'])->name('admin.pages.print_receipt');

        // Exam Module
        Route::get('/examcreateExam', [ExamController::class,'exam'])->name('admin.pages.exam');
        
        Route::get('/allExam', [ExamController::class,'allExam'])->name('admin.get.allExam');
        
        Route::post('/createExam', [ExamController::class,'createExam'])->name('admin.post.createExam')->withoutMiddleware([VerifyCsrfToken::class]);        

        // Job Module
        Route::get('/jobs', [JobController::class,'jobs'])->name('admin.pages.jobs');
        
        Route::get('/allJobs', [JobController::class,'allJobs'])->name('admin.get.allJobs');
        
        Route::get('/addJobs', function () {
            return view('admin.pages.addJobs');
        })->name('admin.pages.addJobs');
        
        Route::post('/createJob', [JobController::class,'createJob'])->name('admin.post.createJob')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateJob', [JobController::class,'updateJob'])->name('admin.pages.updateJob');
        Route::get('/applicants', [ApplicantController::class,'applicants'])->name('admin.pages.applicants');
        
        Route::get('/contact', [ContactController::class,'contact'])->name('admin.pages.contact');
        
        Route::get('/setting', function () {
            return view('admin.pages.setting');
        })->name('admin.pages.setting');

        Route::get('/notice', [NoticeController::class,'notice'])->name('admin.pages.notice');
        
        Route::get('/allNotice', [NoticeController::class,'allNotice'])->name('admin.get.allNotice');
        
        Route::get('/addNotice', [NoticeController::class,'addNotice'])->name('admin.pages.addNotice');
        
        Route::post('/createNotice', [NoticeController::class,'createNotice'])->name('admin.post.createNotice')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/banner', [BannerController::class,'banner'])->name('admin.pages.banner');
        
        Route::get('/allBanner', [BannerController::class,'allBanner'])->name('admin.get.allBanner');
        
        Route::get('/addBanner', [BannerController::class,'addBanner'])->name('admin.pages.addBanner');
        
        Route::post('/createBanner', [BannerController::class,'createBanner'])->name('admin.post.createBanner')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/gallery', [GalleryController::class,'gallery'])->name('admin.pages.gallery');
        
        Route::get('/allGallery', [GalleryController::class,'allGallery'])->name('admin.get.allGallery');
        
        Route::get('/addGallery', [GalleryController::class,'addGallery'])->name('admin.pages.addGallery');
        
        Route::post('/createGallery', [GalleryController::class,'createGallery'])->name('admin.post.createGallery')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/updateAppdata', [AppdataController::class,'updateAppdata'])->name('admin.post.updateAppdata')->withoutMiddleware([VerifyCsrfToken::class]);


        // delete operation
        Route::post('/delete', [AppdataController::class,'delete'])->name('admin.post.delete')->withoutMiddleware([VerifyCsrfToken::class]);        


        // Post Requests

        
    });
    
        // Post/Action requests end


});
