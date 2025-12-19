<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/contact', function () {
    return view('pages.contact');
})->name('user.contact');