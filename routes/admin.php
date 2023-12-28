<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultystaffController;
use App\Http\Controllers\Admin\NewseventController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\RoutineController;
use App\Http\Controllers\Admin\StudentadmissionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Backend\EnrollmentController;
use App\Http\Controllers\Backend\ResultController;
use App\Models\Admin\Routine;

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



// NEWS AND EVENT START  
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/create-event', [NewseventController::class, 'createEvent'])->name('event.create');
    Route::post('/store-event', [NewseventController::class, 'storeOrUpdate'])->name('event.store');
    Route::get('/list-event', [NewseventController::class, 'listEvent'])->name('event.list');
    Route::get('/edit-event/{id}', [NewseventController::class, 'editEvent'])->name('event.edit');
    Route::put('/update-event/{id?}', [NewseventController::class, 'storeOrUpdate'])->name('event.update');
    Route::get('/delete-event/{id}', [NewseventController::class, 'deleteOrUpdate'])->name('event.delete');
});
// NEWS AND EVENT END 


/** CONTACT START */
Route::middleware(['admin:admin'])->group(function (){
  Route::get('/contact-create', [ContactController::class, 'createContact'])->name('contact.create');
  Route::post('/contact-store', [ContactController::class, 'contactCreateOrStore'])->name('contact.store');
  Route::get('/contact-list', [ContactController::class, 'contactList'])->name('contact.list');
  Route::get('/contact-edit/{id}', [ContactController::class, 'contactEdit'])->name('contact.edit');
  Route::post('/contact-update/{id?}', [ContactController::class, 'contactCreateOrStore'])->name('contact.update');
  Route::get('/contact-delete/{id}', [ContactController::class, 'contactDelete'])->name('contact.delete');
});
/** CONTACT END  */



/**{---ROUTINE START----} */
Route::middleware(['admin:admin'])->group(function (){
    Route::get('/contact-routine', [RoutineController ::class, 'createRoutine'])->name('routine.create');
    Route::post('/store-routine', [RoutineController ::class, 'storeOrUpdateRoutine'])->name('routine.store');
    Route::get('/list-routine', [RoutineController ::class, 'listRoutine'])->name('routine.list');
    Route::get('/edit-routine/{id}', [RoutineController ::class, 'editRoutine'])->name('routine.edit');
    Route::put('/update-routine/{id?}', [RoutineController ::class, 'storeOrUpdateRoutine'])->name('routine.update');
    Route::get('/delete-routine/{id}', [RoutineController ::class, 'deleteRoutine'])->name('routine.delete');
});
/**{---ROUTINE END----} */




/**__{--ABOUT START--}__ */
Route::middleware(['admin:admin'])->group(function (){
    Route::get('/about-index', [AboutController ::class, 'aboutIndex'])->name('about.index');
});
/**__{--ABOUT END --}__ */



