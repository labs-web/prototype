<?php

namespace App\Imports\Autorisation;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
     protected $password;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
        public function model(array $row)
    {

      // Check if 'name' and 'email' columns are not empty in the Excel file
      $name = !empty($row[0]) ? $row[0] : 'Default Name';
      $lastname = !empty($row[1]) ? $row[1] : 'xample.com';
      $email = !empty($row[2]) ? $row[2] : 'example@example.com';


      return new User([
          'name' => $name,
          'lastname' => $lastname,
          'email' => $email,
          'password' => Hash::make($row[3] ?? 'password'),
      ]);
    }
    
    
    
    
    
}
