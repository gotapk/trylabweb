<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    $projects = \App\Models\Project::orderBy('order')->get();
    $experiments = \App\Models\Experiment::orderBy('order')->get();
    $translations = \App\Models\Translation::all()->groupBy('locale')->map(function ($group) {
        return $group->pluck('value', 'key');
    });

    return view('welcome', compact('projects', 'experiments', 'translations'));
});

Route::post('/api/contact', [ContactController::class, 'submit']);

// Admin Dashboard & CMS Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\AdminCMSController::class, 'index'])->name('admin.index');
    Route::get('/visits', [\App\Http\Controllers\AdminCMSController::class, 'visits'])->name('admin.visits');
    Route::get('/messages', [\App\Http\Controllers\AdminCMSController::class, 'messages'])->name('admin.messages');
    Route::post('/messages/{message}/read', [\App\Http\Controllers\AdminCMSController::class, 'markAsRead'])->name('admin.messages.read');
    
    // CMS CRUD
    Route::get('/projects', [\App\Http\Controllers\AdminCMSController::class, 'projects'])->name('admin.projects');
    Route::post('/projects', [\App\Http\Controllers\AdminCMSController::class, 'storeProject'])->name('admin.projects.store');
    Route::put('/projects/{project}', [\App\Http\Controllers\AdminCMSController::class, 'updateProject'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [\App\Http\Controllers\AdminCMSController::class, 'deleteProject'])->name('admin.projects.delete');

    Route::get('/experiments', [\App\Http\Controllers\AdminCMSController::class, 'experiments'])->name('admin.experiments');
    Route::post('/experiments', [\App\Http\Controllers\AdminCMSController::class, 'storeExperiment'])->name('admin.experiments.store');
    Route::put('/experiments/{experiment}', [\App\Http\Controllers\AdminCMSController::class, 'updateExperiment'])->name('admin.experiments.update');
    Route::delete('/experiments/{experiment}', [\App\Http\Controllers\AdminCMSController::class, 'deleteExperiment'])->name('admin.experiments.delete');
    
    Route::get('/translations', [\App\Http\Controllers\AdminCMSController::class, 'translations'])->name('admin.translations');
    Route::post('/translations', [\App\Http\Controllers\AdminCMSController::class, 'storeTranslation'])->name('admin.translations.store');
});