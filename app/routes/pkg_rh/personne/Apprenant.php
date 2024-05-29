<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_rh\PersonneController; 

// Namespace all routes within this file
Route::middleware('auth')->group(function () {
    $namespace = 'App\Http\Controllers\pkg_rh';
    Route::namespace($namespace)->group(function () {
        Route::prefix('Apprenant')->group(function () {
            Route::get('/', [PersonneController::class, 'index'])->name('apprenant.index');
            Route::get('/form-ajouter', [PersonneController::class, 'create'])->name('apprenant.create');
            Route::post('/ajouter', [PersonneController::class, 'store'])->name('apprenant.store');
            Route::get('/{id}', [PersonneController::class, 'show'])->name('apprenant.show');
            Route::get('/{id}/edit', [PersonneController::class, 'edit'])->name('apprenant.edit');
            Route::post('/{id}/update', [PersonneController::class, 'update'])->name('apprenant.update');
            Route::delete('/{id}/delete', [PersonneController::class, 'destroy'])->name('apprenant.delete');
        });
    });
});
