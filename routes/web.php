<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// home page
Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('test');
});

//? namespace
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // ADMIN
    Route::middleware(['auth','isAdmin'])->group(function(){
        Route::resource('admin', AdminController::class);
        Route::resource('/student', StudentController::class);

    });

    // STUDENT 
    Route::middleware(['auth','isStudent'])->group(function(){
        Route::get('/dashboard', function () { 
            return view('dashboard');
        })->name('dashboard');
        // Route::resource('student', StudentController::class);

    });
});

require __DIR__.'/auth.php';
