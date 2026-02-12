<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;


Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::resource('organization', OrganizationController::class);

use App\Http\Controllers\InstitutionController;

Route::resource('institutions', InstitutionController::class);

use App\Http\Controllers\ModuleController;

Route::resource('modules', ModuleController::class);

