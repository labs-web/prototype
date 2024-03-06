<?php

namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Task;
use App\Repositories\AppBaseRepository;
use Illuminate\Database\Eloquent\Model;

class TaskRepository extends AppBaseRepository {
    protected $model;

    public function __construct(Task $task){
        $this->model = $task;
    }
   
}

