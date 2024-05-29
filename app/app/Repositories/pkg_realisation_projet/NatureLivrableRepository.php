<?php

namespace App\Repositories\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\NatureLivrable;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_realisation_projet\NatureLivrableAlreadyExistException;

/**
 * Classe NatureLivrableRepository qui gère la persistance des NatureLivrables dans la base de données.
 */
class NatureLivrableRepository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour les NatureLivrables.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom'
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
     * Constructeur de la classe NatureLivrableRepository.
     */
    public function __construct()
    {
        parent::__construct(new NatureLivrable());
    }

    /**
     * Crée un nouveau NatureLivrable.
     *
     * @param array $data Données du NatureLivrable à créer.
     * @return mixed
     * @throws NatureLivrableAlreadyExistException Si le NatureLivrable existe déjà.
     */
    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingNatureLivrable = $this->model->where('nom', $nom)->exists();

        if ($existingNatureLivrable) {
            throw new NatureLivrableAlreadyExistException("A NatureLivrable with the same name already exists.");
        } else {
            return parent::create($data);
        }
    }

    /**
     * Recherche les NatureLivrables correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}

