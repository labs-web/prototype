<?php

use App\Http\Controllers\Autorisation\RolesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\TaskController;

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/Autorisation/roles', RolesController::class);
});

Auth::routes();
