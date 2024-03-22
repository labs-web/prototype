<?php

namespace App\Helpers\Autorisation;

use Illuminate\Support\Facades\Route;

class Helpers
{
    public static function extractControllerNames(): array
    {
        $extractControllerNames = [];
        // Loop through all routes
        foreach (Route::getRoutes() as $route) {
            $action = $route->getAction();
            // Check if the route has a controller key in its action
            if (array_key_exists('controller', $action)) {
                $fullControllerName = $action['controller'];

                // Check if the controller is in the correct namespace and does not belong to Auth namespace
                if (
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
