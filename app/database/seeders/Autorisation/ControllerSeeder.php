<?php

namespace Database\Seeders\Autorisation;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\Autorisation\Controller as AutorisationController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ControllerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $controllerNames = $this->extractControllerNames();

        foreach ($controllerNames as $controllerName) {
            AutorisationController::create(['nom' => $controllerName]);
        }
    }

    public static function extractControllerNames(): array {
        $extractControllerNames = [];
        // Loop through all routes
        foreach(Route::getRoutes() as $route) {
            $action = $route->getAction();
            // Check if the route has a controller key in its action
            if(array_key_exists('controller', $action)) {
                $fullControllerName = $action['controller'];

                // Check if the controller is in the correct namespace and does not belong to Auth namespace
                if(
                    strpos($fullControllerName, 'App\Http\Controllers\\') === 0 &&
                    strpos($fullControllerName, 'App\Http\Controllers\Auth\\') !== 0
                ) {
                    // Extract the controller class name without the namespace and method
                    $controllerNameWithNamespace = str_replace('App\Http\Controllers\\', '', $fullControllerName);
                    $controllerNameParts = explode('\\', $controllerNameWithNamespace);
                    $controllerClassName = end($controllerNameParts); // Get the last part (controller class name)
                    $controllerClassNameWithoutMethod = strtok($controllerClassName, '@');
                    $extractControllerNames[] = $controllerClassNameWithoutMethod;
                }
            }
        }
        // Remove duplicate controller names
        $uniqueControllerNames = array_unique($extractControllerNames);
        return $uniqueControllerNames;
    }



}
