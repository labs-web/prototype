<?php

namespace App\Repositories\GestionProjets;

use App\Models\Autorisation\Role;
use App\Repositories\BaseRepositorie;

class RoleRepository extends BaseRepositorie {
    protected $model;

    public function __construct(Role $role){
        $this->model = $role;
    }
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}
