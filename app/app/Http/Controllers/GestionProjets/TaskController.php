<?php

namespace App\Http\Controllers\GestionProjets;

use Illuminate\Http\Request;
use App\Repositories\GestionProjets\TaskRepository;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Http\Requests\GestionProjets\taskRequest;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GestionProjets\TaskExport;
use App\Imports\GestionProjets\ImportTask;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    protected $taskRepository;
    protected $projetRepisotorie;

    public function __construct(TaskRepository $taskRepository, ProjetRepository $projetRepisotorie){
        $this->taskRepository = $taskRepository;
        $this->projetRepisotorie = $projetRepisotorie;
    }

    public function index(Request $request){
        $projects = $this->taskRepository->filter();
        $tasks = $this->taskRepository->paginate();
        if($request->ajax()){
            $searchTask = $request->get('searchTask');
            $searchTask = str_replace(" ", "%", $searchTask);
            $tasks = $this->taskRepository->search($searchTask);
            return view('GestionProjets.task.index', compact('tasks','projects'))->render();
        }
        return view('GestionProjets.task.index', compact('tasks', 'projects'));
    }

    public function show(Request $request,$id){
        $project = $this->projetRepisotorie->find($id);
        $projects = $this->taskRepository->filter();
        $tasks = $project->tasks()->paginate();
        if($request->ajax()){
            $searchTask = $request->get('searchTask');
            $searchTask = str_replace(" ", "%", $searchTask);
            $tasks = $this->taskRepository->searchData($searchTask,$id);
            return view('GestionProjets.task.index', compact('tasks','projects','project'))->render();
        }
        return view('GestionProjets.task.index', compact('tasks', 'projects','project'));
    }

    public function detail(Request $request, $id){
        $task = $this->taskRepository->find($id);
        return view('GestionProjets.task.show', compact('task'));
    }

    public function create(){
        $projects = $this->taskRepository->filter();
        return view('GestionProjets.task.create',compact('projects'));
    }

    public function store(taskRequest $request){
        $data = $request->all();
        $tasks = $this->taskRepository->create($data);
        return back()->with('success','Tâche ajoutée avec succès.');
    }

    public function edit($id){
        $task = $this->taskRepository->find($id);
        $projects = $this->taskRepository->filter();
        return view('GestionProjets.task.edit',compact('task','projects'));
    }

    public function update(Request $request,$task_id){
        $data = $request->all();
        $task = $this->taskRepository->update($task_id,$data);
        return back()->with('success','Tâche mise à jour avec succès.');
    }

    
    public function destroy($task_id)
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
