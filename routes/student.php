<?php

use Illuminate\Support\Facades\Route;

//Guest Route Group
// Route::middleware(['guest'])->group(function () {
//     // Admin Auth Route
//     Route::get('/', function () {
//         return redirect()->route('admin.login');
//     });
//     Route::controller(AuthController::class)->group(function () {
//         Route::get('/login', 'login')->name('login');
//         Route::post('/authenticate', 'authenticate')->name('authenticate');
//         Route::get('/register', 'register')->name('register');
//         Route::post('/store', 'store')->name('store');
//         Route::get('/forgot-password', 'forgot_password')->name('forgot_password');
//     });
// });

//Authenticated Admin Route
// Route::middleware(['student:student'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
//     Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// });
