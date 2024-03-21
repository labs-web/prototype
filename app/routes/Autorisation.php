<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autorisation\GestionControllersController;

Route::group(['middleware' => ['auth']], function () {
    // Routes for managing controllers
    Route::get('controllers', [GestionControllersController::class, 'index'])->name('controllers.index');
    Route::get('controllers/create', [GestionControllersController::class, 'create'])->name('controllers.create');
    Route::post('controllers', [GestionControllersController::class, 'store'])->name('controllers.store');
    Route::get('controllers/{controller}/edit', [GestionControllersController::class, 'edit'])->name('controllers.edit');
    Route::put('controllers/{controller}', [GestionControllersController::class, 'update'])->name('controllers.update');
    Route::delete('controllers/{controller}', [GestionControllersController::class, 'destroy'])->name('controllers.destroy');
    Route::post('/downloadSeeder', [GestionControllersController::class, 'downloadSeeder'])->name('controllers.download');
});

Auth::routes();
