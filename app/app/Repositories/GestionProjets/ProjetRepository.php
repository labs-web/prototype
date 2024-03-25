<?php

namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Projet;
use App\Repositories\BaseRepositorie;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\GestionProjets\ProjectAlreadyExistException;

class ProjetRepository extends BaseRepositorie
{
    protected $model;

    public function __construct(Projet $projet)
    {
        $this->model = $projet;
    }
    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingProject = Projet::where('nom', $nom)->exists();

        if ($existingProject) {
            throw ProjectAlreadyExistException::createProject();
        } else {
            return parent::create($data);
        }
    }
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}
