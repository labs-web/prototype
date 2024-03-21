<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Permission ;
use App\Repositories\BaseRepositorie;
use Illuminate\Support\Facades\Artisan;

class GestionPermissionsRepository extends BaseRepositorie {
    protected $model;

    public function __construct(Permission $Permission){
        $this->model = $Permission;
    }
    
    public function search($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('name', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }

    public function filter()
    {
       return Permission::all();
    }
}
