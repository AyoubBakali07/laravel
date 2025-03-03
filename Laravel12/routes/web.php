<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test' ,[ProductController::class, 'index'])->name('test');
Route::post('/test',[ProductController::class, 'store']);

Route::get('welcome', function () {
return inertia('Welcome');
})->name('welcome');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
