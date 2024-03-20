<?php

use App\Http\Controllers\Autorisation\RolesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/Autorisation/roles', RolesController::class);
    Route::get('/Autorisation/roles/export',[RolesController::class,'export'])->name('roles.export');
    Route::post('/Autorisation/roles/import',[RolesController::class,'import'])->name('roles.import');
});


Auth::routes();
