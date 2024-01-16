<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AdmissionController;

Route::group(['prefix' => 'view'], function () {
    Route::get('/admission', [AdmissionController::class, 'CreateAdmission'])->name('create.admission');
    Route::post('/admission-store', [AdmissionController::class, 'StoreAndUpdateAdmission'])->name('store.admission');
});