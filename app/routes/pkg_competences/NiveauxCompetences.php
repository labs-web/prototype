<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\niveauxCompetencesController;

// routes for project management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('niveauxCompetences', niveauxCompetencesController::class);
        Route::get('niveaux_Competences/export', [niveauxCompetencesController::class, 'export'])->name('niveauxCompetences.export');
        Route::post('niveaux_Competences/import', [niveauxCompetencesController::class, 'import'])->name('niveauxCompetences.import');
    });
});
