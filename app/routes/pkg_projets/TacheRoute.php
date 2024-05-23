<?php

use App\Models\pkg_projets\Tache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_projets\TacheController;

// routes for tasks management
Route::middleware('auth')->group(function () {
    // Route::prefix('/tasks')->group(function () {
    //     Route::resource('tasks', TaskController::class);
    //     Route::get('tasks/export', [TaskController::class, 'export'])->name('tasks.export');
    //     Route::post('tasks/import', [TaskController::class, 'import'])->name('tasks.import');
    // });
    // Route::get('/kanban', [TacheController::class, 'index']);
    Route::get('/kanban', function () {
        return view('pkg_projets.kanban');
    });
    // Route::get('/fetch-tasks', [TacheController::class, 'fetchTasks']);
    Route::get('/fetch-tasks', function () {
        $taches = Tache::with('statut_taches')->get();
        $boardsData = [
            'a-faire' => ['id' => '_a-faire', 'title' => 'A faire', 'class' => 'default', 'items' => []],
            'encours' => ['id' => '_encours', 'title' => 'En cours', 'class' => 'success', 'items' => []],
            'envalidation' => ['id' => '_envalidation', 'title' => 'En validation', 'class' => 'warning', 'items' => []],
            'terminer' => ['id' => '_terminer', 'title' => 'Terminer', 'class' => 'info', 'items' => []],
            'enattente' => ['id' => '_enattente', 'title' => 'En attente', 'class' => 'default', 'items' => []],
            'reportee' => ['id' => '_reportee', 'title' => 'Reportée', 'class' => 'default', 'items' => []],
            'annulee' => ['id' => '_annulee', 'title' => 'Annulée', 'class' => 'default', 'items' => []],
        ];

        foreach ($taches as $tache) {
            if ($tache->statut_taches) {
                switch ($tache->statut_taches->nom) {
                    case 'A faire':
                        $boardsData['a-faire']['items'][] = ['title' => $tache->nom];
                        break;
                    case 'En cours':
                        $boardsData['encours']['items'][] = ['title' => $tache->nom];
                        break;
                    case 'En validation':
                        $boardsData['envalidation']['items'][] = ['title' => $tache->nom];
                        break;
                    case 'Terminer':
                        $boardsData['terminer']['items'][] = ['title' => $tache->nom];
                        break;
                    case 'En attente':
                        $boardsData['enattente']['items'][] = ['title' => $tache->nom];
                        break;
                    case 'Reportée':
                        $boardsData['reportee']['items'][] = ['title' => $tache->nom];
                        break;
                    case 'Annulée':
                        $boardsData['_annulee']['items'][] = ['title' => $tache->nom];
                        break;
                }
            }
        }
        return response()->json(array_values($boardsData));

    });



});
