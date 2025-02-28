<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/about',function(){
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
