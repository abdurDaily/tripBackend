<?php

use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified', 'admin'])->prefix('dashboard/')->name('dashboard.')->group(function(){
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  

  //*BLOG'S
  Route::prefix('blogs/')->name('blogs.')->group(function(){
      Route::get('/', [BlogController::class, 'index'])->name('index');
  });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
