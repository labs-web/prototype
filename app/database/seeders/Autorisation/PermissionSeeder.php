<?php

namespace Database\Seeders\Autorisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\Autorisation\Controller as AutorisationController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
        {
            $controllerNames = $this->extractControllerNames();
    
            foreach ($controllerNames as $functionControllerPair) {
                // Assuming your table has fields for function and controller
                DB::table('your_table_name')->insert([
                    'function' => explode('-', $functionControllerPair)[0],
                    'controller' => explode('-', $functionControllerPair)[1]
                ]);
            }
        }
    
        public static function extractControllerNames(): array
        {
            $extractControllerNames = [];
    
            // Loop through all routes
            foreach (Route::getRoutes() as $route) {
                $actionParts = explode('@', $route->getActionName()); // Use getActionName instead of fullControllerName
                $controllerClassName = $actionParts[0]; // Get the controller class name
    
                // Check if a method is defined in the action
                if (isset($actionParts[1])) {
                    $methodName = $actionParts[1]; // Get the method name
                    $functionControllerPair = "$methodName-$controllerClassName";
                    $extractControllerNames[] = $functionControllerPair;
                }
            }
    
            // Remove duplicate controller names
            $uniqueControllerNames = array_unique($extractControllerNames);
            return $uniqueControllerNames;
        }    
    }
