<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Personne;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PersonneSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = User::ADMIN;

        Schema::disableForeignKeyConstraints();
        Personne::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_rh/Personnes.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if ($firstline) {
                $firstline = false;
                continue;
            }

            if (count($data) < 6) {
                continue;
            }

            $existingPersonne = Personne::where('nom', $data[0])
                ->where('prenom', $data[1])
                ->where('type', $data[2])
                ->where('created_at', $data[3])
                ->where('updated_at', $data[4])
                ->where('groupe_id', $data[5])
                ->first();

            if (!$existingPersonne) {
                Personne::create([
                    "nom" => $data[0],
                    "prenom" => $data[1],
                    "type" => $data[2],
                    "created_at" => $data[3],
                    "updated_at" => $data[4],
                    "groupe_id" => $data[5],
                ]);
            }
        }

        fclose($csvFile);

        $permissions = $this->readPermissionsFromCSV();
        foreach ($permissions as $permissionName) {
            $existingPermission = Permission::where('name', $permissionName)->first();
            if (!$existingPermission) {
                Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }

        $admin = Role::where('name', $adminRole)->first();
        if ($admin) {
            $admin->givePermissionTo($permissions);
        }
    }

    private function readPermissionsFromCSV(): array
    {
        $permissionsArray = [];

        $csvFilePermissions = fopen(base_path("database/data/pkg_rh/Permissions.csv"), "r");

        fgetcsv($csvFilePermissions);

        while (($data = fgetcsv($csvFilePermissions)) !== FALSE) {
            $permissionsArray[] = $data[0];
        }

        fclose($csvFilePermissions);

        return $permissionsArray;
    }
}