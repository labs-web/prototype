<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Action ;
use App\Models\Autorisation\Controller ;
use App\Repositories\BaseRepositorie; 
use Illuminate\Support\Facades\Artisan; 
use ReflectionClass;
use ReflectionMethod;

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
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->where('controller_id', $id)->paginate($perPage);
    }

    public function search($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
    
    public function filter()
    {
       return Controller::all();
    }
   
function extractControllerActions(string $basePath): array
{
    $actions = [];

    $files = glob($basePath . '/**/*.php', GLOB_BRACE);

    foreach ($files as $file) {
        $className = basename($file, '.php');

        if (strpos($className, 'Controller') !== false) {
            require_once $file;
            $reflection = new ReflectionClass($className);
            $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

            foreach ($methods as $method) {
                if ($method->getName() !== '__construct') {
                    $actions[] = $method->getName() . '-' . $className;
                }
            }
        }
    }

    return $actions;
}

}
