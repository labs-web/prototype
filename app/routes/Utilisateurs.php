<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\TaskController;
use App\Http\Controllers\Utilisateurs\UtilisateursController;

Route::group(['middleware' => ['auth']], function(){
Route::resource("utilisateurs", UtilisateursController::class);
Route::get("export-utilisateurs", [UtilisateursController::class, 'exportUtilisateurs'])->name('export.utilisateurs');
Route::post("import-utilisateurs", [UtilisateursController::class, 'importUtilisateurs'])->name('import.utilisateurs');
});

Auth::routes();
