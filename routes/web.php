<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ModuleController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Organization Routes
|--------------------------------------------------------------------------
*/
Route::get('organization/deleted', [OrganizationController::class, 'deleted'])
    ->name('organization.deleted');

Route::get('organization/restore/{id}', [OrganizationController::class, 'restore'])
    ->name('organization.restore');

Route::delete('organization/force-delete/{id}', [OrganizationController::class, 'forceDelete'])
    ->name('organization.forceDelete');

Route::patch(
    'organization/{id}/toggle-status',
    [OrganizationController::class, 'toggleStatus']
)->name('organization.toggleStatus');

Route::resource('organization', OrganizationController::class);


/*
|--------------------------------------------------------------------------
| Institution Routes
|--------------------------------------------------------------------------
*/
Route::get('institutions/deleted', [InstitutionController::class, 'deleted'])
    ->name('institutions.deleted');

Route::get('institutions/restore/{id}', [InstitutionController::class, 'restore'])
    ->name('institutions.restore');

Route::delete('institutions/force-delete/{id}', [InstitutionController::class, 'forceDelete'])
    ->name('institutions.forceDelete');

Route::patch(
    'institutions/{id}/toggle-status',
    [InstitutionController::class, 'toggleStatus']
)->name('institutions.toggleStatus');

Route::resource('institutions', InstitutionController::class);


/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
*/
Route::get('modules/deleted', [ModuleController::class, 'deleted'])
    ->name('modules.deleted');

Route::get('modules/restore/{id}', [ModuleController::class, 'restore'])
    ->name('modules.restore');

Route::delete('modules/force-delete/{id}', [ModuleController::class, 'forceDelete'])
    ->name('modules.forceDelete');

Route::patch(
    'modules/{id}/toggle-status',
    [ModuleController::class, 'toggleStatus']
)->name('modules.toggleStatus');

Route::resource('modules', ModuleController::class);
