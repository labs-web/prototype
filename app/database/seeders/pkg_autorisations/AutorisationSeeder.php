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


        $AdminRole = User::ADMIN;
        $MembreRole = User::APPRENANT;

        Schema::disableForeignKeyConstraints();
        Autorisation::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_autorisations/Autorisations.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                Autorisation::create([
                    
                        "id"=>$data[0],
                                        
                        "action_id"=>$data[1],

                        "role_id"=>$data[2],
                                        
                        "created_at"=>$data[3],
                    
                        "updated_at" => $data[4],                    
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

    }
}
