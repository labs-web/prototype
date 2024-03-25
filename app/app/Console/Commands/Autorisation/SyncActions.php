<?php

namespace App\Console\Commands\Autorisation;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Autorisation\Action;
use App\Models\Autorisation\Controller;
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

            foreach ($methods as $methodName) {
                Action::firstOrCreate([
                    'nom' => $methodName,
                    'controller_id' => $controller->id
                ]);
            }
        }

        $this->info('Controllers and actions synced successfully.');
    }
}
