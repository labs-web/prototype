<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::ADMIN;
        $apprenant = User::APPRENANT;
        $formateur = User::FORMATEUR;
    
        User::create([
            'name' => 'apprenant',
            'email' => 'apprenant@solicode.co',
            'password' => Hash::make('apprenant'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole($apprenant);

        User::create([
            'name' => 'admin',
            'email' => 'admin@solicode.co',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole($admin);

        User::create([
            'name' => 'formateur',
            'email' => 'formateur@solicode.co',
            'password' => Hash::make('formateur'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole($formateur);


        // $permissionsAdmin = [
        //     'index-ProjetController',
        //     'show-ProjetController',
        //     'create-ProjetController',
        //     'store-ProjetController',
        //     'edit-ProjetController',
        //     'update-ProjetController',
        //     'destroy-ProjetController',
        //     'export-ProjetController',
        //     'import-ProjetController'
        // ];

        // $permissionsApprenant = [
        //     'index-ProjetController',
        //     'show-ProjetController',
        // ];

        $adminRole = Role::where('name', $admin)->first();
        $apprenantRole = Role::where('name', $apprenant)->first();
        $formateurRole = Role::where('name', $formateur)->first();

        // $adminRole->givePermissionTo($permissionsAdmin);
        // $formateurRole->givePermissionTo($permissionsAdmin);
        // $apprenantRole->givePermissionTo($permissionsApprenant);
    }
}

