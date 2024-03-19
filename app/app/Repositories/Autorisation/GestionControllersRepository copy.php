<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Controller as AutorisationController;
use App\Repositories\BaseRepositorie;

class GestionControllersRepository extends BaseRepositorie {
    protected $model;

    public function __construct(AutorisationController $Controller){
        $this->model = $Controller;
    }

}
