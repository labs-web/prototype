<?php

namespace Database\Seeders\pkg_autorisations;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pkg_autorisations\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_autorisations/Permissions.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                Permission::create([


                    "id" => $data[0],

                    "name" => $data[1],

                    "guard_name" => $data[2],


                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
