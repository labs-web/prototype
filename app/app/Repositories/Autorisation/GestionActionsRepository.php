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
   
 
    public function extractAndInsertControllerActions(string $basePath): void
    {
        $actions = [];

        $files = glob($basePath . '/**/*.php', GLOB_BRACE);

        foreach ($files as $file) {
            $className = basename($file, '.php');

            if (strpos($className, 'Controller') !== false) {
                require_once $file;
                $reflection = new ReflectionClass($className);
                $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

                $controllerName = str_replace('Controller', '', $className);

                // Insert controller into the controller table
                $controller = Controller::create([
                    'nom' => $controllerName,
                ]);

                foreach ($methods as $method) {
                    if ($method->getName() !== '__construct') {
                        $actionName = $method->getName();

                        // Insert action into the action table
                        $action = Action::create([
                            'nom' => $actionName,
                            'controller_id' => $controller->id,
                        ]);
                    }
                }
            }
        }
    }
    

}
