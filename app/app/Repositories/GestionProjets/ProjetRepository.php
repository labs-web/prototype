<?php

namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Projet;
use App\Repositories\AppBaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjetRepository extends AppBaseRepository {
    protected $model;

    public function __construct(Projet $projet){
        $this->model = $projet;
    }
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}