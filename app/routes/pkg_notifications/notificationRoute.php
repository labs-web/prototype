<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_notifications\notificationController;

Route::middleware('auth')->group(function () {
    Route::prefix('/notifications')->group(function () {
        // Route::put('/CategorieTechnologie/{CategorieTechnologie}/update', [notificationController::class, 'update'])->name('CategorieTechnologie.update');
        // Route::get('/CategorieTechnologie/export', [notificationController::class, 'export'])->name('CategorieTechnologie.export');
        // Route::post('/CategorieTechnologie/import', [notificationController::class, 'import'])->name('CategorieTechnologie.import');
        Route::resource('/notifications', notificationController::class);
    });
});