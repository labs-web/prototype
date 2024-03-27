<?php

namespace App\Repositories\Autorisation;

use App\Models\User;
use App\Repositories\BaseRepositorie;

class GestionAutorisationRepository extends BaseRepositorie {
    protected $model;

    public function __construct(User $user){
        $this->model = $user;
    }


  

    
}