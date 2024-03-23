<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autorisation\GestionControllersController;
use App\Http\Controllers\Autorisation\PermissionController;

Route::group(['middleware' => ['auth'], 'prefix' => 'Autorisations'], function () {
    // Routes for managing controllers
    Route::get('controllers', [GestionControllersController::class, 'index'])->name('controllers.index');
    Route::get('controllers/create', [GestionControllersController::class, 'create'])->name('controllers.create');
    Route::post('controllers', [GestionControllersController::class, 'store'])->name('controllers.store');
    Route::get('controllers/{controller}/edit', [GestionControllersController::class, 'edit'])->name('controllers.edit');
    Route::put('controllers/{controller}', [GestionControllersController::class, 'update'])->name('controllers.update');
    Route::delete('controllers/{controller}', [GestionControllersController::class, 'destroy'])->name('controllers.destroy');
    Route::post('/downloadSeeder', [GestionControllersController::class, 'downloadSeeder'])->name('controllers.download');
    // Routes for managing actions
    Route::prefix('actions')->group(function () {
        Route::get('/', [ActionController::class, 'index'])->name('actions.index');
        Route::get('controller/{id}/actions', [ActionController::class, 'show'])->name('actions.show');
        Route::get('/create', [ActionController::class, 'create'])->name('actions.create');
        Route::post('/', [ActionController::class, 'store'])->name('actions.store');
        Route::get('/{action}/edit', [ActionController::class, 'edit'])->name('actions.edit');
        Route::put('/{action}', [ActionController::class, 'update'])->name('actions.update');
        Route::delete('/{action}', [ActionController::class, 'destroy'])->name('actions.destroy');
        Route::post('/downloadSeeder', [ActionController::class, 'downloadSeeder'])->name('actions.download'); 
    });

    
});


Auth::routes();
