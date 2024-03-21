<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Controller as AutorisationController;
use App\Repositories\BaseRepositorie; 
use Illuminate\Support\Facades\Artisan; 
use ReflectionClass;
use ReflectionMethod;

class GestionPermissionsRepository extends BaseRepositorie {
    protected $model;

    public function __construct(Permission $Permission){
        $this->model = $Permission;
    }
    
    public function search($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('name', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }

    public function filter()
    {
       return AutorisationController::all();
    }

function extractControllerPermissions(string $basePath): array
{
    $permissions = [];

    $files = glob($basePath . '/**/*.php', GLOB_BRACE);

    foreach ($files as $file) {
        $className = basename($file, '.php');

        if (strpos($className, 'Controller') !== false) {
            require_once $file;
            $reflection = new ReflectionClass($className);
            $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

            foreach ($methods as $method) {
                if ($method->getName() !== '__construct') {
                    $permissions[] = $method->getName() . '-' . $className;
                }
            }
        }
    }

    return $permissions;
}

}
