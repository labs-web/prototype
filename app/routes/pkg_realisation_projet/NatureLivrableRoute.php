<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_realisation_projet\NatureLivrableController;

// Routes for Nature Livrable management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('nature-livrables', NatureLivrableController::class);
        Route::get('nature/export', [NatureLivrableController::class, 'export'])->name('nature-livrables.export');
        Route::post('nature-livrables/import', [NatureLivrableController::class, 'import'])->name('nature-livrables.import');
    });
});

