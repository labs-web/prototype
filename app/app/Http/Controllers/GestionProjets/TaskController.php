<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GestionProjets\TaskRepository;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository){
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request,$id){
        $tasks = $this->taskRepository->paginatedData();
        $projetRepisotorie = new ProjetRepository();
        $project = $this->projetRepisotorie->show($id);
        if($request->ajax()){
            $searchTask = $request->get('searchTask');
            $searchTask = str_replace(" ", "%", $searchTask);
            $tasks = $this->taskRepository->searchData($searchTask);
            return view('GestionProjets.task.index', compact('tasks', 'project'))->render();
        }
        return view('GestionProjets.task.index', compact('tasks', 'project'));
    }
}
