<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\WorkStatusController;
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/', function () {
    return view('dashboard');
});



Route::get('/religion', [ReligionController::class, 'index']);

Route::get('/religion', [ReligionController::class, 'index'])->name('religion.index');
Route::get('/religion/create', [ReligionController::class, 'create'])->name('religion.create');
Route::post('/religion/store', [ReligionController::class, 'store'])->name('religion.store');
Route::get('/religion/edit/{id}', [ReligionController::class, 'edit'])->name('religion.edit');
Route::post('/religion/update/{id}', [ReligionController::class, 'update'])->name('religion.update');
Route::get('/religion/delete/{id}', [ReligionController::class, 'destroy'])->name('religion.delete');

Route::get('/religion/trash', [ReligionController::class, 'trash'])->name('religion.trash');
Route::get('/religion/restore/{id}', [ReligionController::class, 'restore'])->name('religion.restore');
Route::get('/religion/force-delete/{id}', [ReligionController::class, 'forceDelete'])->name('religion.forceDelete');

// ------------------ JOB TYPE ------------------

Route::get('/job-type', [JobTypeController::class, 'index'])->name('job-type.index');
Route::get('/job-type/create', [JobTypeController::class, 'create'])->name('job-type.create');
Route::post('/job-type/store', [JobTypeController::class, 'store'])->name('job-type.store');
Route::get('/job-type/edit/{id}', [JobTypeController::class, 'edit'])->name('job-type.edit');
Route::post('/job-type/update/{id}', [JobTypeController::class, 'update'])->name('job-type.update');
Route::get('/job-type/delete/{id}', [JobTypeController::class, 'destroy'])->name('job-type.delete');

Route::get('/job-type/trash', [JobTypeController::class, 'trash'])->name('job-type.trash');
Route::get('/job-type/restore/{id}', [JobTypeController::class, 'restore'])->name('job-type.restore');
Route::get('/job-type/force-delete/{id}', [JobTypeController::class, 'forceDelete'])->name('job-type.forceDelete');

// ------------------ WORK STATUS ------------------

Route::get('/work-status', [WorkStatusController::class, 'index'])->name('work-status.index');
Route::get('/work-status/create', [WorkStatusController::class, 'create'])->name('work-status.create');
Route::post('/work-status/store', [WorkStatusController::class, 'store'])->name('work-status.store');
Route::get('/work-status/edit/{id}', [WorkStatusController::class, 'edit'])->name('work-status.edit');
Route::post('/work-status/update/{id}', [WorkStatusController::class, 'update'])->name('work-status.update');
Route::get('/work-status/delete/{id}', [WorkStatusController::class, 'destroy'])->name('work-status.delete');

Route::get('/work-status/trash', [WorkStatusController::class, 'trash'])->name('work-status.trash');
Route::get('/work-status/restore/{id}', [WorkStatusController::class, 'restore'])->name('work-status.restore');
Route::get('/work-status/force-delete/{id}', [WorkStatusController::class, 'forceDelete'])->name('work-status.forceDelete');

use App\Http\Controllers\OrganizationController;
Route::resource('organization', OrganizationController::class);

use App\Http\Controllers\InstitutionController;

Route::resource('institutions', InstitutionController::class);

use App\Http\Controllers\ModuleController;

Route::resource('modules', ModuleController::class);