<?php

use App\Http\Controllers\pkg_autorisations\ActionController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'prefix' => 'Autorisations'], function () {
    Route::prefix('/actions')->group(function () {
        Route::get('/', [ActionController::class, 'index'])->name('actions.index');
        Route::get('/create', [ActionController::class, 'create'])->name('actions.create');
        Route::get('/{id}/actions', [ActionController::class, 'show'])->name('task.show');
        Route::post('/store', [ActionController::class, 'store'])->name('actions.store');
        Route::get('/{action}/edit', [ActionController::class, 'edit'])->name('actions.edit');
        Route::put('/{action}', [ActionController::class, 'update'])->name('actions.update');
        Route::delete('/{action}', [ActionController::class, 'destroy'])->name('actions.destroy');
        Route::get('/sync-actions', [ActionController::class, 'SyncControllersActions'])->name('actions.sync');
    });
   
   
});
Auth::routes();