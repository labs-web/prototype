<?php

namespace App\Imports\utilisateurs;

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
      $prenom = !empty($row[1]) ? $row[1] : 'Default Name';
      $nom = !empty($row[2]) ? $row[2] : 'xample.com';
      $email = !empty($row[3]) ? $row[3] : 'example@example.com';


      return new User([
          'prenom' => $prenom,
          'nom' => $nom,
          'email' => $email,
          'password' => Hash::make($row[4] ?? 'password'),
      ]);
    }
    
    
    
    
    
}
