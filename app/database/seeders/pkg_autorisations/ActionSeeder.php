<?php

namespace Database\Seeders\pkg_autorisations;

use App\Models\pkg_autorisations\Permission;
use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Undefined array key 5



        // $AdminRole = User::ADMIN;
        // $MembreRole = User::APPRENANT;

        // Schema::disableForeignKeyConstraints();
        // Action::truncate();
        // Schema::enableForeignKeyConstraints();

        // $csvFile = fopen(base_path("database/data/pkg_autorisations/Actions.csv"), "r");
        // $firstline = true;
        // $i = 0;
        // while (($data = fgetcsv($csvFile)) !== FALSE) {


        //     if (!$firstline) {
        //         Action::create([


        //             "id" => $data[0],

        //             "nom" => $data[1],

        //             "controller_id" => $data[2],

        //             "permission_id" => $data[3],

        //             "parent_action_id" => $data[4],

        //             "created_at" => $data[5],

        //             "updated_at" => $data[6]
        //         ]);
        //     }
        //     $firstline = false;
        // }

        // fclose($csvFile);
        // $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        // foreach ($actions as $action) {
        //     $permissionName = $action . '-' . "TachesController";
        //     Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        // }

        // $tachesManagerRolePermissions = [
        //     'index-TachesController',
        //     'show-TachesController',
        //     'create-TachesController',
        //     'store-TachesController',
        //     'edit-TachesController',
        //     'update-TachesController',
        //     'destroy-TachesController',
        //     'export-TachesController',
        //     'import-TachesController'
        // ];

        // $tachesMembreRolePermissions = [
        //     'index-TachesController',
        //     'show-TachesController',
        // ];

        // $admin = Role::where('name', $AdminRole)->first();
        // $membre = Role::where('name', $MembreRole)->first();

        // $admin->givePermissionTo($tachesManagerRolePermissions);
        // $membre->givePermissionTo($tachesMembreRolePermissions);

    }
}
