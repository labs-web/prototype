<?php

use App\Http\Controllers\pkg_projets\TaskController;
use Illuminate\Support\Facades\Route;


// routes for tasks management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('tache', TaskController::class);
        Route::get('tache/export', [TaskController::class, 'export'])->name('tache.export');
        Route::post('tache/import', [TaskController::class, 'import'])->name('tache.import');
        // digrame degant
        Route::get('tasks/diagramme-de-Gantt', [TaskController::class, 'indexGantt'])->name('tasks.gantt');    });
});
