<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/articles', function (){
    return "articles.index";
});
Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class, 'login']);
Route::middleware('auth.middleware')->group(function(){
Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
});
// route for logout
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::resource('articles', ArticleController::class);
