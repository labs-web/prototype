<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pkg_competences\TechnologieController;

// routes for project management
Route::middleware('auth')->group(function () {
    Route::prefix('/technologie')->group(function () {
        Route::resource('technologies', TechnologieController::class);
        Route::get('technologies/export', [TechnologieController::class, 'export'])->name('technologies.export');
        Route::post('technologies/import', [TechnologieController::class, 'import'])->name('technologies.import');
    });
});