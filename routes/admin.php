<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDataController;
use App\Http\Controllers\JobController;


// Admin routes

Route::middleware(['admin_auth_middleware'])->group(function () {

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
        
        Route::get('/jobs', function () {
            return view('admin.pages.jobs');
        })->name('admin.jobs');
        
        Route::get('/addJobs', function () {
            return view('admin.pages.addJobs');
        })->name('admin.addJobs');
        
        Route::get('/setting', function () {
            return view('admin.pages.setting');
        })->name('admin.setting');

        // Post Requests

        Route::post('/createJob', [JobController::class,'createJob'])->name('admin.post.createJob')->withoutMiddleware([VerifyCsrfToken::class]);
        
        
    });
    
        // Post/Action requests end


});
