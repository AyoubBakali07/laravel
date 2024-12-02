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
// Route::get('/articles', [ArticleController::class,'index'])->name('articles.index');
// Route::get('/articles/{id}',[ArticleController::class, 'show'])->name('articles.show');
Route::resource('articles', ArticleController::class);

