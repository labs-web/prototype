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
            'name' => 'required|string|max:25',
        ];

        $rules['name'] = Rule::unique('roles', 'name');

        $validator = Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }


        $role = Role::where('name', $row['name'])->first();

        if (!$role) {
            return null;
        }

        return new Role([
            'name' => $row['name'],
            'guard_name' => 'web'
        ]);
    }
}
