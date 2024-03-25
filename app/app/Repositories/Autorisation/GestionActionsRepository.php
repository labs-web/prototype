<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Action ;
use App\Models\Autorisation\Controller ;
use App\Repositories\BaseRepositorie; 
use Illuminate\Support\Facades\Artisan; 
use ReflectionClass;
use ReflectionMethod;
use App\Exceptions\Autorisation\ActionException;

class GestionActionsRepository extends BaseRepositorie {
    protected $model;

    public function __construct(Action $Action){
        $this->model = $Action;
    }
    public function find($id){
        return $this->model->with('controller')->find($id);
    }

    public function searchData($searchableData, $id, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData, $id) {
            $query->where('nom', 'like', '%' . $searchableData . '%');
        })->where('controller_id', $id)->paginate($perPage);
    }

    public function search($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
    
    public function filter()
    {
       return Controller::all();
    }
   
    public function create(array $actionData)
    {
        // Check for duplicate action before creating
        $existingAction = $this->model->where('nom', $actionData['nom'])
            ->where('controller_id', $actionData['controller_id'])
            ->first();

        if ($existingAction) {
            throw new ActionException(__('Autorisation/action/message.createActionException'));
        }

        return $this->model->create($actionData);
    }

  
    

}
