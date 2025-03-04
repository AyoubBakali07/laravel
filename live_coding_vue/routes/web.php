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

Route::get('/TestPage',  [ProductController::class,'index'])->name('TestPage');
Route::post('/TestPage', [ProductController::class, 'store'])->name('product.store');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
