<?php

namespace App\Imports\Autorisation;

use App\Models\Autorisation\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class RolesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $rules = [
            'nom' => 'required|string|max:25',
        ];

        $validator = Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        $existingRole = Role::where('name', $row['nom'])->exists();

        if ($existingRole) {
            return null;
        }

        return new Role([
            'name' => $row['nom'],
            'guard_name' => 'web'
        ]);
    }
}