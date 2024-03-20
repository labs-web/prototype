<?php

namespace App\Repositories\Autorisation;

use App\Models\User;
use App\Repositories\BaseRepositorie;
use Illuminate\Database\Eloquent\Model;

class UtilisateursRepository extends BaseRepositorie {
    protected $model;

    public function __construct(User $user){
        $this->model = $user;
    }


    public function getUsers($query){
        return User::where(function($queryBuilder) use ($query) {
                 $queryBuilder->where('name', 'like', '%' . $query . '%');
             })->paginate(4); 
    }
    

}