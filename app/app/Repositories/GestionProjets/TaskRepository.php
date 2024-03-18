<?php

namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Task;
use App\Models\GestionProjets\Projet;
use App\Repositories\BaseRepositorie;
use Illuminate\Database\Eloquent\Model;

class TaskRepository extends BaseRepositorie {
    protected $model;

    public function __construct(Task $task){
        $this->model = $task;
    }

    public function paginatedData($perPage = 4){
        return $this->model->with('project')->paginate($perPage);
    }

    public function searchData($searchableData, $id, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData, $id) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->where('project_id', $id)->paginate($perPage);
    }
    
    public function filter()
    {
       return Projet::all();
    }
   
}