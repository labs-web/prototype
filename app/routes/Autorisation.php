<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autorisation\PermissionController;

Route::group(['middleware' => ['auth']], function(){
    Route::get('/autorisations/permission',[PermissionController::class,'index'])->name('permission.index');
    Route::get('/autorisation/{id}/permission',[PermissionController::class,'show'])->name('permission.show');
    Route::get('/autorisation/permission-ajouter',[PermissionController::class,'create'])->name('permission.create');
    Route::post('/autorisation/permission-ajouter',[PermissionController::class,'store'])->name('permission.store');
    Route::get('/autorisation/permission/{id}/edit',[PermissionController::class,'edit'])->name('permission.edit');
    Route::put('/autorisation/permission/{id}/update',[PermissionController::class,'update'])->name('permission.update');
    Route::delete('/autorisation/permission/{id}/delete',[PermissionController::class,'destroy'])->name('permission.delete');
});

Auth::routes();
