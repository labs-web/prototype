<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_autorisations\GestionControllersController;

// routes for project management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('controllers', [GestionControllersController::class, 'index'])->name('controllers.index');
        Route::get('controllers/create', [GestionControllersController::class, 'create'])->name('controllers.create');
        Route::post('controllers', [GestionControllersController::class, 'store'])->name('controllers.store');
        Route::get('controllers/{controller}/edit', [GestionControllersController::class, 'edit'])->name('controllers.edit');
        Route::put('controllers/{controller}', [GestionControllersController::class, 'update'])->name('controllers.update');
        Route::delete('controllers/{controller}', [GestionControllersController::class, 'destroy'])->name('controllers.destroy');
        // Route::post('/downloadSeeder', [GestionControllersController::class, 'downloadSeeder'])->name('controllers.download');
        Route::get('/syncControllers', [GestionControllersController::class, 'syncControllers'])->name('controllers.sync');

    });
});
