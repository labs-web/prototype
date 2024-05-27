<?php

namespace Database\Seeders\pkg_competences;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use App\Models\pkg_competences\Technologie;
use App\Models\pkg_notifications\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ==========================================================
        // ================= Add Seeder Technologies ================
        // ==========================================================
        Schema::disableForeignKeyConstraints();
        Technologie::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/technologies/Technologies.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Technologie::create([
                    "nom" => $data['0'],
                    "description" => $data['1'],
                    "categorie_technologies_id" => $data['2'],
                    "competence_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);


        // ==========================================================
        // =========== Add Seeder Permission Assign Role ============
        // ==========================================================
        $FormateurRole = User::FORMATEUR;
        $Role = Role::where('name', $FormateurRole)->first();

        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/technologies/TechnologiesPermissions.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Permission::create([
                    "name" => $data['0'],
                    "guard_name" => $data['1'],
                ]);

                if ($Role) {
                    // If the role exists, update its permissions
                    $Role->givePermissionTo($data['0']);
                } else {
                    // If the role doesn't exist, create it and give permissions
                    $Role = Role::create([
                        'name' => $FormateurRole,
                        'guard_name' => 'web',
                    ]);
                    $Role->givePermissionTo($data['0']);
                }
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}