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
use App\Http\Controllers\JobController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\GalleryController;


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

        Route::get('/staff', [StaffController::class,'staff'])->name('admin.pages.staff');
        
        Route::get('/allStaff', [StaffController::class,'allStaff'])->name('admin.get.allStaff');
        
        Route::get('/addStaff', [StaffController::class,'addStaff'])->name('admin.pages.addStaff');
        
        Route::post('/createStaff', [StaffController::class,'createStaff'])->name('admin.post.createStaff')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/classes', [ClassesController::class,'classes'])->name('admin.pages.classes');
        
        Route::get('/allClasses', [ClassesController::class,'allClasses'])->name('admin.get.allClasses');
        
        Route::get('/addClass', [ClassesController::class,'addClass'])->name('admin.pages.addClass');
        
        Route::post('/createClass', [ClassesController::class,'createClass'])->name('admin.post.createClass')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/classSections', [ClassSectionController::class,'classSections'])->name('admin.pages.classSections');
        
        Route::get('/allClassSections', [ClassSectionController::class,'allClassSections'])->name('admin.get.allClassSections');
        
        Route::get('/addClassSection', [ClassSectionController::class,'addClassSection'])->name('admin.pages.addClassSection');
        
        Route::post('/createClassSection', [ClassSectionController::class,'createClassSection'])->name('admin.post.createClassSection')->withoutMiddleware([VerifyCsrfToken::class]);        

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

        Route::get('/gallery', [GalleryController::class,'gallery'])->name('admin.pages.gallery');
        
        Route::get('/allGallery', [GalleryController::class,'allGallery'])->name('admin.get.allGallery');
        
        Route::get('/addGallery', [GalleryController::class,'addGallery'])->name('admin.pages.addGallery');
        
        Route::post('/createGallery', [GalleryController::class,'createGallery'])->name('admin.post.createGallery')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/updateAppdata', [AppdataController::class,'updateAppdata'])->name('admin.post.updateAppdata')->withoutMiddleware([VerifyCsrfToken::class]);


        // Post Requests

        
    });
    
        // Post/Action requests end


});
