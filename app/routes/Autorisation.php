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
    
    // Routes for managing permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('/', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::put('/{permission}', [PermissionController::class, 'update'])->name('permission.update');
        Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
        Route::post('/downloadSeeder', [PermissionController::class, 'downloadSeeder'])->name('permission.download');
    });

    
});


Auth::routes();
