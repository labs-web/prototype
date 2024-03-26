<?php

namespace App\Repositories\Autorisation;

use App\Models\User;
use App\Repositories\BaseRepositorie;
use App\Exceptions\Autorisation\UserDoesNotExist;
use App\Exceptions\Autorisation\UserAlreadyExistsException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UtilisateursRepository extends BaseRepositorie {
    protected $model;

    public function __construct(User $user){
        $this->model = $user;
    }


    public function getUsers($query){
        return User::where(function($queryBuilder) use ($query) {
                 $queryBuilder->where('prenom', 'like', '%' . $query . '%');
             })->paginate(4); 
    }


    public function create(array $data)
    {
        if (User::where('email', $data['email'])->exists()) {
            throw UserAlreadyExistsException::creatingUserThatAlreadyExists();
        }
        return $this->model->create($data);
    }
    


    public function update($id, array $data)
    {
        try {
            $record = $this->model->findOrFail($id);
            $record->update($data);
            return true;
        } catch (ModelNotFoundException $exception) {
            throw UserDoesNotExist::UpdateUserThatDoesNotExist();
        }
    }
    
}