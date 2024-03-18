<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\TaskController;

Route::group(['middleware' => ['auth']], function(){
    Route::get('/projet/{id}/task',[TaskController::class,'index'])->name('task.index');
});

Auth::routes();
