<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepositorie;
use Illuminate\Database\Eloquent\Model;

class UtilisateursRepository extends BaseRepositorie {
    protected $model;

    public function __construct(User $user){
        $this->model = $user;
    }

}