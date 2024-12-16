<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});
Route::get('/', function (){
    return " hey articles.index";
})->name('login');

// Route::get('/articles', [ArticleController::class,'index'])->name('articles.index');
// Route::get('/articles/{id}',[ArticleController::class, 'show'])->name('articles.show');
// Route::resource('articles', ArticleController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

