<?php

use Illuminate\Support\Facades\Route;
// use product controller
use App\Http\Controllers\ProductController; 



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/product', ProductController::class); 
