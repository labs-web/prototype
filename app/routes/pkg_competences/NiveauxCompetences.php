<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\NiveauxCompetencesController;

// routes for Niveaux Competences management
Route::middleware('auth')->group(function () {
    Route::prefix('/competences')->group(function () {
        Route::resource('niveauxCompetences', NiveauxCompetencesController::class);
        Route::get('niveaux_Competences/export', [NiveauxCompetencesController::class, 'export'])->name('niveauxCompetences.export');
        Route::post('niveaux_Competences/import', [NiveauxCompetencesController::class, 'import'])->name('niveauxCompetences.import');
    });
});
