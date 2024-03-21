<?php

namespace Database\Seeders\Autorisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\Autorisation\Permission ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use App\Repositories\Autorisation\GestionPermissionsRepository ;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $basePath1 = app_path('Http/Controllers/Autorisation');
        $basePath2 = app_path('Http/Controllers/GestionProjets');
        $basePaths = [$basePath1, $basePath2];

        $permissions = app(GestionPermissionsRepository::class, [new Permission]); // Using dependency injection (optional)

        $extractedPermissions = $permissions->extractControllerPermissions($basePaths);

        foreach ($extractedPermissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }
    }
}
