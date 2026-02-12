<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ModuleController;

Route::get('/dashboard', function () {
    return view('dashboard');
});

/*
|--------------------------------------------------------------------------
| Organization
|--------------------------------------------------------------------------
*/
Route::get('/', [OrganizationController::class, 'index']);


// Deleted list
Route::get('/organization/deleted', [OrganizationController::class, 'deleted'])
    ->name('organization.deleted');

// Restore
Route::get('/organization/restore/{id}', [OrganizationController::class, 'restore'])
    ->name('organization.restore');

// Force delete
Route::delete('/organization/force-delete/{id}', [OrganizationController::class, 'forceDelete'])
    ->name('organization.forceDelete');

// Resource route (ONLY ONCE)
Route::resource('organization', OrganizationController::class);


/*
|--------------------------------------------------------------------------
| Institutions
|--------------------------------------------------------------------------
*/

// Deleted list
Route::get('/institutions/deleted', [InstitutionController::class, 'deleted'])
    ->name('institutions.deleted');

// Restore
Route::get('/institutions/restore/{id}', [InstitutionController::class, 'restore'])
    ->name('institutions.restore');

// Force delete
Route::delete('/institutions/force-delete/{id}', [InstitutionController::class, 'forceDelete'])
    ->name('institutions.forceDelete');

// Toggle status
Route::get('/institutions/toggle-status/{id}', [InstitutionController::class, 'toggleStatus'])
    ->name('institutions.toggleStatus');

// Resource route
Route::resource('institutions', InstitutionController::class);


/*
|--------------------------------------------------------------------------
| Modules
|--------------------------------------------------------------------------
*/
Route::get('modules/deleted', [ModuleController::class, 'deleted'])
    ->name('modules.deleted');

Route::get('modules/restore/{id}', [ModuleController::class, 'restore'])
    ->name('modules.restore');

Route::delete('modules/force-delete/{id}', [ModuleController::class, 'forceDelete'])
    ->name('modules.forceDelete');
Route::resource('modules', ModuleController::class);
