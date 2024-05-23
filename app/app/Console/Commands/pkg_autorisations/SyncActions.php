<?php

namespace App\Console\Commands\pkg_autorisations;

use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use ReflectionClass;
use ReflectionMethod;

class SyncActions extends Command
{
    protected $signature = 'sync:ControllersActions';
    protected $description = 'Sync controllers and actions from code to database';

    public function handle()
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
                /**
                 * Retrieves the public methods of a given class using reflection.
                 *
                 * @param string $class The fully qualified class name.
                 * @return array An array containing the names of the public methods.
                 */
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
            $previousAction = null;

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

                // Update the action with the permission ID and parent_action_id
                $action->update([
                    'permission_id' => $permission->id,
                ]);

                $previousAction = $action;
            }
        }

        $this->info('Controllers and actions synced successfully.');
    }
}
