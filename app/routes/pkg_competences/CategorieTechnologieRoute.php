<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\CategorieTechnologieController;

Route::middleware('auth')->group(function () {
    Route::prefix('/competences')->group(function () {
        Route::put('/CategorieTechnologie/{CategorieTechnologie}/update', [CategorieTechnologieController::class, 'update'])->name('CategorieTechnologie.update');
        Route::get('/CategorieTechnologie/export', [CategorieTechnologieController::class, 'export'])->name('CategorieTechnologie.export');
        Route::post('/CategorieTechnologie/import', [CategorieTechnologieController::class, 'import'])->name('CategorieTechnologie.import');
        Route::resource('/CategorieTechnologie', CategorieTechnologieController::class);
    });
});