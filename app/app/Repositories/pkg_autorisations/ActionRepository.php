<?php

namespace App\Repositories\pkg_autorisations;

use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use Mockery;
use Illuminate\Support\Facades\File;
use ReflectionClass;
use ReflectionMethod;

class ActionRepository
{
    /**
     * Syncs controllers and their actions from the codebase to the database.
     */
    public function syncActions()
    {
        $controllersPath = app_path('Http/Controllers');
        $controllers = [];

        // Scan the controllers directory
        $files = File::allFiles($controllersPath);

        foreach ($files as $file) {
            $class = 'App\\Http\\Controllers\\' . str_replace('.php', '', $file->getRelativePathname());

            // Check if the file represents a valid controller class
            if (class_exists($class)) {
                // Extract controller name
                $controllerName = class_basename($class);

                // Get controller methods
                $methods = [];
                $reflector = new ReflectionClass($class);
                foreach ($reflector->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                    if ($method->class === $class && !$method->isConstructor()) {
                        $methods[] = $method->name;
                    }
                }

                $controllers[$controllerName] = $methods;
            }
        }

        // Insert data into the database
        foreach ($controllers as $controllerName => $methods) {
            $controller = Controller::firstOrCreate(['nom' => $controllerName]);
            foreach ($methods as $methodName) {
                // Create or get the action
                $action = Action::firstOrCreate([
                    'nom' => $methodName,
                    'controller_id' => $controller->id
                ]);

                // Create or get the permission
                $permissionName = "{$methodName}-{$controllerName}";
                $permission = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'guard_name' => 'web'
                ]);

                // Update the action with the permission ID
                $action->update([
                    'permission_id' => $permission->id,
                ]);
            }
        }
    }
}