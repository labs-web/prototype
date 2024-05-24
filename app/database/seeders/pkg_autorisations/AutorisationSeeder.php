<?php

namespace Database\Seeders\pkg_autorisations;

use App\Models\pkg_autorisations\Autorisation;
use App\Models\pkg_autorisations\Permission;
use App\Models\pkg_autorisations\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AutorisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`prtotype`.`autorisations`, CONSTRAINT `autorisations_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`)) (Connection: mysql, SQL: insert into `autorisations` (`id`, `action_id`, `role_id`, `created_at`, `updated_at`) values (1, 1, 1, 2023-01-15 08:30:00, 2023-01-15 08:30:00))


        // $AdminRole = User::ADMIN;
        // $MembreRole = User::APPRENANT;

        // Schema::disableForeignKeyConstraints();
        // Autorisation::truncate();
        // Schema::enableForeignKeyConstraints();

        // $csvFile = fopen(base_path("database/data/pkg_autorisations/Autorisations.csv"), "r");
        // $firstline = true;
        // $i = 0;
        // while (($data = fgetcsv($csvFile)) !== FALSE) {


        //     if (!$firstline) {
        //         Autorisation::create([

                    
        //                 "id"=>$data[0],
                                        
        //                 "action_id"=>$data[1],

        //                 "role_id"=>$data[2],
                                        
        //                 "created_at"=>$data[3],
                    
        //                 "updated_at" => $data[4],                    
        //         ]);
        //     }
        //     $firstline = false;
        // }

        // fclose($csvFile);

    }
}
