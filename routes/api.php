<?php
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Admin\SignInController;
use App\Http\Controllers\Auth\UserController;
// use Illuminate\Support\Facades\Route;


//b835460c-0720-11f1-bceb-586c25a41e6e
Route::post('/login', [SignInController::class, 'login']);
Route::post('/send-otp', [SignInController::class, 'sendOtp']);
Route::post('/verify-otp', [SignInController::class, 'verifyOtp']);
Route::post('/set-mpin', [SignInController::class, 'setMpin']);

Route::middleware('auth:sanctum')->group(function () {

    // Users (Admin only)
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::post('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // Roles (Admin only)    
    Route::get('/roles', [RoleController::class, 'index']);
    Route::post('/role', [RoleController::class, 'store']);
    Route::post('/roles/{id}', [RoleController::class, 'update']);
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
    
    // Logout
    Route::post('/logout', [SignInController::class, 'logout']);
});
