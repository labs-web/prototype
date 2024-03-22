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
    
    public function search($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('controller', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }

    public function filter()
    {
    return Controller::all();
    }
    public function filterByController($controllerName)
    {
        return $this->model->where('controller', $controllerName)->get();
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
