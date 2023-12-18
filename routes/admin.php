<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultystaffController;
use App\Http\Controllers\Admin\StudentadmissionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Backend\EnrollmentController;
use App\Http\Controllers\Backend\ResultController;

//Guest Route Group
Route::middleware(['guest'])->group(function () {
    // Admin Auth Route
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/forgot-password', 'forgot_password')->name('forgot_password');
    });
});

//Authenticated Admin Route
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



//FACULTY AND STAFF START 
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/create-employee', [FacultystaffController::class, 'createEmployee'])->name('employee.create');
    Route::post('/store-employee', [FacultystaffController::class, 'storeAndUpdate'])->name('employee.store');
    Route::get('/show-all-employee', [FacultystaffController::class, 'showEmployee'])->name('employee.show');
    Route::get('/edit-employee/{id}', [FacultystaffController::class, 'editEmployee'])->name('employee.edit');
    Route::put('/update-employee/{id?}', [FacultystaffController::class, 'storeAndUpdate'])->name('employee.update');
    Route::get('/delete-employee/{id}', [FacultystaffController::class, 'deleteEmployee'])->name('employee.delete');
});
//FACULTY AND STAFF END 

// Route::prefix('')->controller()->name('')->group(function(){
//     Route::get('/', 'index')->name('index');
//     Route::get('/create', 'create')->name('create');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/show/{id}', 'show')->name('show');
//     Route::get('/edit/{id}', 'edit')->name('edit');
//     Route::put('/update/{id}', 'update')->name('update');
//     Route::delete('/delete/{id}', 'destroy')->name('delete');
//     Route::get('/change-status', 'change_status')->name('change_status');
// });