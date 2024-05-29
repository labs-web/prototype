<?php

namespace Database\Seeders\pkg_autorisations;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use App\Models\pkg_autorisations\Controller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\pkg_autorisations\Controller as GestionAutorisationController;


class ControllerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $controllerNames = $this->extractControllerNames();

        foreach ($controllerNames as $controllerName) {
            // Check if the controller already exists in the database
            if (!GestionAutorisationController::where('nom', $controllerName)->exists()) {
                GestionAutorisationController::create(['nom' => $controllerName]);
            }
        }

            // ================ Permission Cotrollers Sesder ================

        $actions = ['index', 'create', 'store', 'edit', 'update', 'destroy', 'downloadSeeder'];

        foreach ($actions as $action) {
            $permissionName = $action . '-' . "GestionControllersController";
            
            // Check if the permission already exists
            if (!Permission::where('name', $permissionName)->exists()) {
                Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }
       

    }

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
