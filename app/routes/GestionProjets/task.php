<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\TaskController;

Route::group(['middleware' => ['auth']], function(){
    Route::get('/projet/task',[TaskController::class,'index'])->name('task.index');
    Route::get('/projet/{id}/task',[TaskController::class,'show'])->name('task.show');
    Route::get('/projet/task-ajouter',[TaskController::class,'create'])->name('task.create');
    Route::get('/projet/task/{id}/edit',[TaskController::class,'edit'])->name('task.edit');
    Route::put('/projet/task/{id}/update',[TaskController::class,'edit'])->name('task.update');
    Route::delete('/projet/task/{id}/delete',[TaskController::class,'destroy'])->name('task.delete');
});

Auth::routes();
