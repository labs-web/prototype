<?php

namespace Database\Seeders\pkg_autorisations;

use Illuminate\Database\Seeder;
use App\Models\pkg_autorisations\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Permission::truncate();
        // Schema::enableForeignKeyConstraints();

        // $csvFile = fopen(base_path("database/data/pkg_autorisations/permissions.csv"), "r");
        // $firstline = true;
        // while (($data = fgetcsv($csvFile)) !== FALSE) {
        //     if (!$firstline) {
        //         Permission::create([
        //             "name"=>$data['0'],
        //             "guard_name"=>$data['1'],
        //         ]);
        //     }
        //     $firstline = false;
        // }

        // fclose($csvFile);
    }
}
