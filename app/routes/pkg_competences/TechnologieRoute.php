<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pkg_competences\TechnologieController;

// routes for project management
Route::middleware('auth')->group(function () {
    Route::prefix('/competences')->group(function () {
        Route::get('technologies/export', [TechnologieController::class, 'export'])->name('technologies.export');
        Route::post('technologies/import', [TechnologieController::class, 'import'])->name('technologies.import');
        Route::resource('technologies', TechnologieController::class);
    });
});