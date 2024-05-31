<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pkg_competences\TechnologieController;

// routes for project management
Route::middleware('auth')->group(function () {
    Route::prefix('/technologies')->group(function () {
        Route::get('technologie/export', [TechnologieController::class, 'export'])->name('technologie.export');
        Route::post('technologie/import', [TechnologieController::class, 'import'])->name('technologie.import');
        Route::resource('technologie', TechnologieController::class);
    });
});