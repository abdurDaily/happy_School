<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultystaffController;
use App\Http\Controllers\Admin\NoticeController;
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
    Route::post('/search-employee', [FacultystaffController::class, 'searchEmployee'])->name('employee.search');
});
//FACULTY AND STAFF END 




// NOTICE START 
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/create-notice', [NoticeController::class, 'createNotice'])->name('notice.create');
    Route::get('/show-notice', [NoticeController::class, 'showNotice'])->name('notice.show');
    Route::post('/store-notice', [NoticeController::class, 'storeAndUpdateNotice'])->name('notice.store');
    Route::get('/edit-notice/{id}', [NoticeController::class, 'editNotice'])->name('notice.edit');
    Route::put('/update-notice/{id?}', [NoticeController::class, 'storeAndUpdateNotice'])->name('notice.update');
    Route::get('/delete-notice/{id}', [NoticeController::class, 'deleteNotice'])->name('notice.delete');
    Route::post('/search-notice', [NoticeController::class, 'searchNotice'])->name('notice.search');
});

// NOTICE END 
