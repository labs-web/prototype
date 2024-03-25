<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\TaskController;
use App\Http\Controllers\GestionProjets\ProjetController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/projets/tâches', [TaskController::class, 'index'])->name('task.index');
    Route::get('/projet/{id}/tâches', [TaskController::class, 'show'])->name('task.show');
    Route::get('/projet/tâches/{id}', [TaskController::class, 'detail'])->name('task.detail');
    Route::get('/projet/tâches-ajouter', [TaskController::class, 'create'])->name('task.create');
    Route::post('/projet/tâches-ajouter', [TaskController::class, 'store'])->name('task.store');
    Route::get('/projet/tâches/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/projet/tâches/{id}/update', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/projet/tâches/{id}/delete', [TaskController::class, 'destroy'])->name('task.delete');
    Route::get('/tâches/export', [TaskController::class, 'export'])->name('task.export');
    Route::post('/tâches/import', [TaskController::class, 'import'])->name('task.import');
    Route::resource('projets', ProjetController::class);
    Route::get('export', [ProjetController::class, 'export'])->name('projets.export');
    Route::post('import', [ProjetController::class, 'import'])->name('projets.import');
});

Auth::routes(['register' => false]);

