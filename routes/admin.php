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
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SubjectController;


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

        // classSections Module
        Route::get('/classSections', [ClassSectionController::class,'classSections'])->name('admin.pages.classSections');
        
        Route::get('/allClassSections', [ClassSectionController::class,'allClassSections'])->name('admin.get.allClassSections');
        
        Route::get('/addClassSection', [ClassSectionController::class,'addClassSection'])->name('admin.pages.addClassSection');
        
        Route::post('/createClassSection', [ClassSectionController::class,'createClassSection'])->name('admin.post.createClassSection')->withoutMiddleware([VerifyCsrfToken::class]);        

        // Classes Module
        Route::get('/classes', [ClassesController::class,'classes'])->name('admin.pages.classes');
        
        Route::get('/allClasses', [ClassesController::class,'allClasses'])->name('admin.get.allClasses');
        
        Route::get('/addClass', [ClassesController::class,'addClass'])->name('admin.pages.addClass');
        
        Route::post('/createClass', [ClassesController::class,'createClass'])->name('admin.post.createClass')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/manageClass/{id}', [ClassesController::class,'manageClass'])->name('admin.pages.manageClass');

        Route::post('/remove_cSection', [ClassesController::class,'remove_cSection'])->name('admin.post.remove_cSection')->withoutMiddleware([VerifyCsrfToken::class]);

        // Subject Module
        Route::get('/subject', [SubjectController::class,'subject'])->name('admin.pages.subject');
        
        Route::get('/allSubject', [SubjectController::class,'allSubject'])->name('admin.get.allSubject');
        
        Route::get('/addSubject', [SubjectController::class,'addSubject'])->name('admin.pages.addSubject');
        
        Route::post('/createSubject', [SubjectController::class,'createSubject'])->name('admin.post.createSubject')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/manageSubject/{id}', [SubjectController::class,'manageSubject'])->name('admin.pages.manageSubject');
        
        Route::post('/removeClass', [SubjectController::class,'removeClass'])->name('admin.post.removeClass')->withoutMiddleware([VerifyCsrfToken::class]);

        // Staff Module
        Route::get('/staff', [StaffController::class,'staff'])->name('admin.pages.staff');
        
        Route::get('/allStaff', [StaffController::class,'allStaff'])->name('admin.get.allStaff');
        
        Route::get('/addStaff', [StaffController::class,'addStaff'])->name('admin.pages.addStaff');
        
        Route::post('/createStaff', [StaffController::class,'createStaff'])->name('admin.post.createStaff')->withoutMiddleware([VerifyCsrfToken::class]);        

        // Student Module
        Route::get('/students', [StudentController::class,'students'])->name('admin.pages.students');
        
        Route::get('/allStudents', [StudentController::class,'allStudents'])->name('admin.get.allStudents');
        
        Route::get('/addStudent', [StudentController::class,'addStudent'])->name('admin.pages.addStudent');
        
        Route::post('/createStudent', [StudentController::class,'createStudent'])->name('admin.post.createStudent')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/jobs', [JobController::class,'jobs'])->name('admin.pages.jobs');
        
        Route::get('/allJobs', [JobController::class,'allJobs'])->name('admin.get.allJobs');
        
        Route::get('/addJobs', function () {
            return view('admin.pages.addJobs');
        })->name('admin.pages.addJobs');
        
        Route::post('/createJob', [JobController::class,'createJob'])->name('admin.post.createJob')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/applicants', [ApplicantController::class,'applicants'])->name('admin.pages.applicants');
        
        Route::get('/setting', function () {
            return view('admin.pages.setting');
        })->name('admin.pages.setting');

        Route::get('/banner', [BannerController::class,'banner'])->name('admin.pages.banner');
        
        Route::get('/allBanner', [BannerController::class,'allBanner'])->name('admin.get.allBanner');
        
        Route::get('/addBanner', [BannerController::class,'addBanner'])->name('admin.pages.addBanner');
        
        Route::post('/createBanner', [BannerController::class,'createBanner'])->name('admin.post.createBanner')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/gallery', [GalleryController::class,'gallery'])->name('admin.pages.gallery');
        
        Route::get('/allGallery', [GalleryController::class,'allGallery'])->name('admin.get.allGallery');
        
        Route::get('/addGallery', [GalleryController::class,'addGallery'])->name('admin.pages.addGallery');
        
        Route::post('/createGallery', [GalleryController::class,'createGallery'])->name('admin.post.createGallery')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/updateAppdata', [AppdataController::class,'updateAppdata'])->name('admin.post.updateAppdata')->withoutMiddleware([VerifyCsrfToken::class]);


        // Post Requests

        
    });
    
        // Post/Action requests end


});
