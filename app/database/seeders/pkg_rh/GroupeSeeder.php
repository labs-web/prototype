<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Groupe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
   
        // Schema::disableForeignKeyConstraints();
        // Groupe::truncate();
        // Schema::enableForeignKeyConstraints();

        // $csvFile = fopen(base_path("database/data/pkg_rh/Groups.csv"), "r");
        // $firstline = true;
     
        // while (($data = fgetcsv($csvFile)) !== FALSE) {
        //     if (!$firstline) {
        //         Groupe::create([
        //             "nom"=>$data['0'],
        //             "description" =>$data['1']
        //         ]);
        //     }
        //     $firstline = false;
        // }

        // fclose($csvFile);
    }
}
