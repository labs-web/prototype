<?php

namespace Database\Seeders\Autorisation;

use App\Models\Autorisation\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesData = [
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'chef_de_projet',
                'guard_name' => 'web',
            ],
        ];

        foreach ($rolesData as $roleData) {
            Role::create($roleData);
        }
    }
}
