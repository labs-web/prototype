<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_realisation_projet\LivrableController;

// routes for deliverable management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('livrables', LivrableController::class);
        Route::get('livrables-export', [LivrableController::class, 'export'])->name('livrables.export');
        Route::post('livrabless-import', [LivrableController::class, 'import'])->name('livrables.import');
    });
});


