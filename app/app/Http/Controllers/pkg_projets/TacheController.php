<?php

namespace App\Http\Controllers\pkg_projets;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\pkg_projets\TacheRepository;

class TacheController extends AppBaseController
{
    protected $tacheRepository;
    public function __construct(TacheRepository $tacheRepository)
    {
        $this->tacheRepository = $tacheRepository;
    }

    public function index(Request $request)
    {
        $tachesData = $this->tacheRepository->paginate();
        return view('pkg_projets.kanban', compact('tachesData'));
    }


    public function fetchTasks()
    {
        $taches = $this->tacheRepository->all();

        $boardsData = [
            'a-faire' => ['title' => 'A faire', 'class' => 'default', 'items' => []],
            'encours' => ['title' => 'En cours', 'class' => 'success', 'items' => []],
            'envalidation' => ['title' => 'En validation', 'class' => 'warning', 'items' => []],
            'terminer' => ['title' => 'Terminer', 'class' => 'info', 'items' => []],
            'enattente' => ['title' => 'En attente', 'class' => 'default', 'items' => []],
            'terminer' => ['title' => 'Terminer', 'class' => 'info', 'items' => []],
            'terminer' => ['title' => 'Terminer', 'class' => 'info', 'items' => []],
        ];


        foreach ($taches as $tache) {
            switch ($tache->status) {
                case 'a-faire':
                    $boardsData['a-faire']['items'][] = ['title' => $tache->title];
                    break;
                case 'encours':
                    $boardsData['encours']['items'][] = ['title' => $tache->title];
                    break;
                case 'envalidation':
                    $boardsData['envalidation']['items'][] = ['title' => $tache->title];
                    break;
                case 'terminer':
                    $boardsData['terminer']['items'][] = ['title' => $tache->title];
                    break;
            }
        }

        return response()->json(array_values($boardsData));
    }
}
