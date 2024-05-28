<?php

use App\Models\pkg_projets\Tache;
use App\Models\pkg_projets\StatutTache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_projets\TacheController;
use Illuminate\Http\Request;


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
        return response()->json($taches);
    });

    Route::post('/update-task-status/{id}', function (Request $request, $id) {
        // getStatusName function defined inside the route closure
        function getStatusName($statusId)
        {
            $statusMap = [
                '_a-faire' => 'A faire',
                '_encours' => 'En cours',
                '_envalidation' => 'En validation',
                '_terminer' => 'Terminer',
                '_enattente' => 'En attente',
                '_reportee' => 'Reportée',
                '_annulee' => 'Annulée'
            ];
            return $statusMap[$statusId] ?? 'A faire';
        }

        $task = Tache::find($id);
        if ($task) {
            $statusName = getStatusName($request->input('status'));
            $status = StatutTache::where('nom', $statusName)->first();
            if ($status) {
                $task->status_tache_id = $status->id;
                $task->save();
                return response()->json(['message' => 'Task status updated successfully']);
            } else {
                return response()->json(['message' => 'Invalid status'], 400);
            }
        }
        return response()->json(['message' => 'Task not found'], 404);
    });

});
