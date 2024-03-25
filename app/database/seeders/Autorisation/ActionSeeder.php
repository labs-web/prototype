<?php

namespace Database\Seeders\Autorisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\Autorisation\Action ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use App\Repositories\Autorisation\GestionActionsRepository ;
class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $basePath1 = app_path('Http/Controllers/Autorisation');
        $basePath2 = app_path('Http/Controllers/GestionProjets');
        $basePath3 = app_path('Http/Controllers/');
        $basePaths = [$basePath1, $basePath2, $basePath3];

        $actions = app(GestionActionsRepository::class, [new Action]); // Using dependency injection (optional)

        $extractedActions = $actions->extractControllerActions($basePaths);

        foreach ($extractedActions as $actionName) {
            Action::firstOrCreate(['nom' => $actionName]);
        }
    }
}
