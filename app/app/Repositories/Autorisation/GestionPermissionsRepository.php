<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Controller as AutorisationController;
use App\Repositories\BaseRepositorie;
use Illuminate\Support\Facades\Artisan;

class GestionPermissionsRepository extends BaseRepositorie {
    protected $model;

    public function __construct(AutorisationController $Controller){
        $this->model = $Controller;
    }
    
    public function search($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('name', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }

    public function filter()
    {
       return AutorisationController::all();
    }
}
