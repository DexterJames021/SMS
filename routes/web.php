<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentPortal\ModuleController;
use App\Http\Controllers\studentPortal\PortalController;
use Illuminate\Support\Facades\Route;

// home page
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('admission', [AdmissionController::class, 'create'])->name('admission');
    Route::post('admission', [AdmissionController::class, 'store'])->name('admission.store');
    Route::get('admission/success', [AdmissionController::class, 'success'])->name('admission.success');
});

//? namespace
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('courses', CourseController::class);
    Route::get('admission-lists', [AdmissionController::class, 'index'])->name('ad-lists');
    Route::get('admission/{id}', [AdmissionController::class, 'show'])->name('admission.show');
});

// STUDENT
Route::middleware(['auth', 'isStudent'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    // Route::resource('portal', PortalController::class);
    Route::resource('module', ModuleController::class);
});




require __DIR__ . '/auth.php';
