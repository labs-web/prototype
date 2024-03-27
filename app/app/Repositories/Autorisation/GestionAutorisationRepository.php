<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Autorisation;
use App\Repositories\BaseRepositorie;


class GestionAutorisationRepository extends BaseRepositorie {
    protected $model;

    public function __construct(Autorisation $user){
        $this->model = $user;
    }


    
}