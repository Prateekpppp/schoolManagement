<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ContactController;


Route::middleware(['custom_session_middleware'])->group(function () {
    Route::get('/', function () {
        return view('pages.index');
    })->name('user.index');

    Route::get('/about', function () {
        return view('pages.about');
    })->name('user.about');

    Route::get('/director', function () {
        return view('pages.director');
    })->name('user.director');

    Route::get('/mission', function () {
        return view('pages.mission');
    })->name('user.mission');

    Route::get('/ourteam', function () {
        return view('pages.ourteam');
    })->name('user.ourteam');

    Route::get('/testimonial', function () {
        return view('pages.testimonial');
    })->name('user.testimonial');

    Route::get('/career', function () {
        return view('pages.career');
    })->name('user.career');
    
    Route::get('/allJobs', [JobController::class,'allJobs'])->name('user.get.allJobs');
        
    Route::post('/applyNow', [ApplicantController::class,'applyNow'])->name('user.post.applyNow')->withoutMiddleware([VerifyCsrfToken::class]);
    

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('user.contact');
    
    Route::post('/submitContactForm', [ContactController::class,'submitContactForm'])->name('user.post.submitContactForm')->withoutMiddleware([VerifyCsrfToken::class]);
  
});