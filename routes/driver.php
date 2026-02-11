<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDataController;
use App\Http\Controllers\DriveractivityController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

// Admin routes

Route::middleware(['admin_auth_check_middleware','custom_admin_session_middleware'])->group(function () {
    
    Route::prefix('driver')->group(function () {
     
        Route::get('/driverRoutes', [DriveractivityController::class,'driverRoutes'])->name('driver.pages.driverRoutes');
        
        Route::get('/updateDriverStatus', [DriveractivityController::class,'updateDriverStatus'])->name('driver.get.updateDriverStatus');

    });


});
