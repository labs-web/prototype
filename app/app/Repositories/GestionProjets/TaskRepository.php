<?php

namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Task;
use App\Models\GestionProjets\Projet;
use App\Repositories\AppBaseRepository;
use Illuminate\Database\Eloquent\Model;

class TaskRepository extends AppBaseRepository {
    protected $model;

    public function __construct(Task $task){
        $this->model = $task;
    }

    public function paginatedData($perPage = 4){
        return $this->model->with('project')->paginate($perPage);
    }

    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }

    public function filter()
    {
       return Projet::all();
    }
   
}

