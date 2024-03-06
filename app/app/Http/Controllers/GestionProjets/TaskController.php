<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GestionProjets\TaskRepository;
use App\Http\Requests\GestionProjets\taskRequest;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TaskExport;
use App\Imports\ImportTask;

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
        $filter = $this->taskRepository->filter();
        if($request->ajax()){
            $searchTask = $request->get('searchTask');
            $searchTask = str_replace(" ", "%", $searchTask);
            $tasks = $this->taskRepository->searchData($searchTask,$id);
            return view('GestionProjets.task.index', compact('tasks', 'project','filter'))->render();
        }
        return view('GestionProjets.task.index', compact('tasks', 'project','filter'));
    }

    public function create($id){
        $projetRepisotorie = new ProjetRepository();
        $project = $this->projetRepisotorie->show($id);
        return view('GestionProjets.task.create',compact('project'));
    }

    public function store(taskRequest $request){
        $data = $request->all();
        $tasks = $this->taskRepository->create($data);
        return back()->with('success','Tâche ajoutée avec succès.');
    }

    public function edit($id, $task_id){
        $task = $this->taskRepository->show($task_id);
        $projetRepisotorie = new ProjetRepository();
        $project = $this->projetRepisotorie->show($id);
        return view('GestionProjets.task.edit',compact('task','project'));
    }

    public function update(Request $request,$task_id){
        $data = $request->all();
        $task = $this->taskRepository->update($task_id,$data);
        return back()->with('success','Tâche mise à jour avec succès.');
    }

    public function destroy($id, $task_id)
    {
        $result = $this->taskRepository->destroy($task_id);
        if ($result) {
            return back()->with('success', 'La tâche a été supprimée avec succès.');
        } else {
            return back()->with('error', 'Échec de la suppression de la tâche. Veuillez réessayer.');
        }
    }

    public function export()
    {
        return Excel::download(new TaskExport, 'Task.xlsx');
    }

    public function import(Request $request)
    {
       
        $file = $request->file('file');
        
        if ($file) {
            $path = $file->store('files');
            Excel::import(new ImportTask, $path);
        }
        
        return redirect()->back();
    }
}
