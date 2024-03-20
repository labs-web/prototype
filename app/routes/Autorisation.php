<?php

use App\Http\Controllers\Autorisation\RolesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/Autorisation/roles', RolesController::class);
    Route::get('/roles/export',[RolesController::class,'export'])->name('role.export');
    Route::post('/roles/import',[RolesController::class,'import'])->name('roles.import');
});


Auth::routes();
