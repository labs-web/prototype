<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autorisation\GestionControllersController;

Route::group(['middleware' => ['auth']], function(){

    // Routes for managing controllers
    Route::get('controllers', [GestionControllersController::class, 'index'])->name('controllers.index');
    Route::get('controllers/create', [GestionControllersController::class, 'create'])->name('controllers.create');
    Route::post('controllers', [GestionControllersController::class, 'store'])->name('controllers.store');
    // Route::get('controllers/{id}', [GestionControllersController::class, 'show'])->name('controllers.show');
    // Route::get('controllers/{id}/edit', [GestionControllersController::class, 'edit'])->name('controllers.edit');
    // Route::put('controllers/{id}', [GestionControllersController::class, 'update'])->name('controllers.update');
    // Route::delete('controllers/{id}', [GestionControllersController::class, 'destroy'])->name('controllers.destroy');

});

Auth::routes();
