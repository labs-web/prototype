<?php

namespace App\Repositories\pkg_rh;

use App\Repositories\BaseRepository;
use App\Models\pkg_rh\Apprenant;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Exceptions\pkg_rh\ApprenantAlreadyExistException;
class ApprenantRepositorie extends BaseRepository
{
    protected $type;

    /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom','prenom','type' ,'groupe_id'
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    /**
     * Constructeur de la classe ProjetRepository.
     */
    public function __construct()
    {
        $this->type = 'apprenant';
        parent::__construct(new Apprenant());
    }

    public function paginate($search = [], $perPage = 10, array $columns = ['*']): LengthAwarePaginator
    {
        if ($this->type !== null) {
            return $this->model->where('type', $this->type)->paginate($perPage, $columns);
        } else {
            return $this->model->paginate($perPage, $columns);
        }
    }

    public function create(array $data)
    {
        $nom = $data['nom'];
        $prenom = $data['prenom'];

    
        $existingApprenant = $this->model->where('nom', $nom)->where('prenom', $prenom)->exists();
    
        if ($existingApprenant) {
            throw ApprenantAlreadyExistException::createApprenant();
        } else {
           
            return parent::create($data);
        }
    }


    /**
     * Recherche apprenants correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 10)
    {
        return Apprenant::where('type', 'Apprenant')->where(function($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('prenom', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}