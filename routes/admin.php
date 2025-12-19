<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDataController;


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
        
        
    });
    
        // Post/Action requests end


});
