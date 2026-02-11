<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

Route::prefix('admin')->group(function () {

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

});




// Login page
Route::view('/login', 'auth.login')->name('login');

// Forgot MPIN page
Route::view('/forgot-mpin', 'auth.forgot-mpin')->name('forgot.mpin');

// OTP verification page
Route::view('/otp', 'auth.otp')->name('otp');

// Set / Reset MPIN page (we’ll create UI later)
Route::view('/set-mpin', 'auth.set-mpin')->name('set.mpin');



// Login submit
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

// Send OTP (from Forgot MPIN)
Route::post('/forgot-mpin', [AuthController::class, 'sendOtp'])
    ->name('forgot.mpin.submit');

// Verify OTP
Route::post('/otp', [AuthController::class, 'verifyOtp'])
    ->name('otp.verify');

// Resend OTP
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])
    ->name('otp.resend');

// Save MPIN
Route::post('/set-mpin', [AuthController::class, 'storeMpin'])
    ->name('mpin.store');
Route::view('/dashboard', 'dashboard.index')
    ->name('dashboard');

Route::get('/otp', [OtpController::class, 'showOtpForm'])->name('otp.form');
Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('otp.send');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('otp.resend');

Route::get('/otp', [OtpController::class, 'showOtpForm'])
    ->name('otp.form');