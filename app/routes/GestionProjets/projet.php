<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionProjets\projetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth']], function(){
    Route::resource('projets' , projetController::class);
    Route::get('export', [projetController::class, 'export'])->name('projets.export');
    Route::post('import', [projetController::class, 'import'])->name('projets.import');
});