<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FinancialYearController;
use App\Http\Controllers\Admin\FinancialYearMappingController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

/*
|--------------------------------------------------------------------------
| Public / Auth Pages
|--------------------------------------------------------------------------
*/

// Login page
Route::view('/', 'auth.login')->name('login');

// Forgot MPIN page
Route::view('/forgot-mpin', 'auth.forgot-mpin')->name('forgot.mpin');

// Set MPIN + OTP pages
Route::view('/set-mpin', 'auth.set-mpin')->name('set.mpin');
Route::view('/otp', 'auth.otp')->name('otp');

/*
|--------------------------------------------------------------------------
| Auth API Endpoints
|--------------------------------------------------------------------------
*/

Route::post('/login', [SignInController::class, 'login'])->name('login.submit');
Route::post('/send-otp', [SignInController::class, 'sendOtp'])->name('forgot.mpin.submit');
Route::post('/resend-otp', [SignInController::class, 'resendOtp'])->name('otp.resend');
Route::post('/verify-otp', [SignInController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/set-mpin', [SignInController::class, 'setMpin'])->name('mpin.store');

/*
|--------------------------------------------------------------------------
| Admin Panel (Authenticated + Admin only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Routes (prefix: /admin, name: admin.*)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */
        Route::view('dashboard', 'admin.dashboard.index')->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Role Management
        |--------------------------------------------------------------------------
        |
        | Uses resource controller for standard CRUD, plus soft-delete helpers.
        |
        */
        Route::resource('roles', RoleController::class)->except(['show']);

        // Soft-deleted roles listing
        Route::get('roles/deleted', [RoleController::class, 'DisplayDeletedRoles'])
            ->name('roles.deleted');

        // Restore soft-deleted role
        Route::put('roles/restore/{id}', [RoleController::class, 'restore'])
            ->name('roles.restore');

        // Permanently delete role
        Route::delete('roles/force-delete/{id}', [RoleController::class, 'forceDeleteRole'])
            ->name('roles.forceDelete');

        /*
        |--------------------------------------------------------------------------
        | User Management
        |--------------------------------------------------------------------------
        |
        | Uses resource controller for standard CRUD, plus soft-delete helpers.
        |
        */
        Route::resource('users', UserController::class)->except(['show']);

        // Soft-deleted users listing
        Route::get('users/deleted', [UserController::class, 'displayDeletedUser'])
            ->name('users.deleted');

        // Restore soft-deleted user
        Route::put('users/restore/{id}', [UserController::class, 'restore'])
            ->name('users.restore');

        // Permanently delete user
        Route::delete('users/force-delete/{id}', [UserController::class, 'forceDeleteUser'])
            ->name('users.forceDelete');

        /*
        |--------------------------------------------------------------------------
        | Financial Year Management
        |--------------------------------------------------------------------------
        |
        | Explicit CRUD routes instead of Route::resource for clarity.
        |
        */

        // List all financial years
        Route::get('financial-years', [FinancialYearController::class, 'index'])
            ->name('financial-years.index');

        // Show create form
        Route::get('financial-years/create', [FinancialYearController::class, 'create'])
            ->name('financial-years.create');

        // Store new financial year
        Route::post('financial-years', [FinancialYearController::class, 'store'])
            ->name('financial-years.store');

        // Show edit form
        Route::get('financial-years/{financial_year}/edit', [FinancialYearController::class, 'edit'])
            ->name('financial-years.edit');

        // Update existing financial year
        Route::put('financial-years/{financial_year}', [FinancialYearController::class, 'update'])
            ->name('financial-years.update');

        // Soft delete financial year
        Route::delete('financial-years/{financial_year}', [FinancialYearController::class, 'destroy'])
            ->name('financial-years.destroy');

        // List soft-deleted financial years
        Route::get('financial-years/deleted', [FinancialYearController::class, 'deleted'])
            ->name('financial-years.deleted');

        // Restore soft-deleted financial year
        Route::put('financial-years/restore/{id}', [FinancialYearController::class, 'restore'])
            ->name('financial-years.restore');

        /*
        |--------------------------------------------------------------------------
        | Financial Year – Hospital Mapping
        |--------------------------------------------------------------------------
        |
        | Screen to map financial years to hospitals and mark current FY per hospital.
        |
        */

        // Mapping screen
        Route::get('financial-years/mapping', [FinancialYearMappingController::class, 'index'])
            ->name('financial-years.mapping');

        // Save mapping for selected hospital
        Route::post('financial-years/mapping', [FinancialYearMappingController::class, 'store'])
            ->name('financial-years.mapping.store');




        // Toggle Routes
        Route::patch('financial-years/toggle-status/{financial_year}', [FinancialYearController::class, 'toggleStatus'])
            ->name('financial-years.toggle-status');
        Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])
            ->name('users.toggle-status');
        Route::patch('roles/{role}/toggle-status', [RoleController::class, 'toggleStatus'])
            ->name('roles.toggle-status');

    });

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', [SignInController::class, 'logout'])->name('logout');
});
