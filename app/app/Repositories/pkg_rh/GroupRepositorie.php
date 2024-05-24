<?php

namespace App\Repositories\pkg_rh;

use App\Repositories\BaseRepository;
use App\Models\pkg_rh\Groupe;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Exceptions\pkg_rh\GroupAlreadyExistException;

class GroupRepositorie extends BaseRepository
{
    protected $type;

    /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom',
        'description'
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
        parent::__construct(new Groupe());
    }

    public function paginate($search = [], $perPage = 0, array $columns = ['*']): LengthAwarePaginator
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        $nom = $data['nom'];
    
        $existingGroup = $this->model->where('nom', $nom)->exists();
    
        if ($existingGroup) {
            throw GroupAlreadyExistException::createGroup();
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
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}