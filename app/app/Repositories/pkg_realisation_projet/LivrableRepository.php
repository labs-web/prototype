<?php
namespace App\Repositories\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\Livrable;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_realisation_projet\LivrableAlreadyExistException;

class LivrableRepository extends BaseRepository
{
    protected $fieldsSearchable = [
        'titre', 'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    public function __construct()
    {
        parent::__construct(new Livrable());
    }


     /**
     * Crée un nouveau projet.
     *
     * @param array $data Données du projet à créer.
     * @return mixed
     * @throws LivrableAlreadyExistException Si le livrable existe déjà.
     */
    public function create(array $data)
    {
        $titre = $data['titre'];
        $lien = $data['lien'];

        $existingLivrable = $this->model->where('titre', $titre)->orWhere('lien', $lien)->exists();

        if ($existingLivrable) {
            throw new LivrableAlreadyExistException("Livrable with the same title or link already exists.");
        } else {
            return parent::create($data);
        }
    }


      /**
     * Recherche les livrables correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('titre', 'like', '%' . $searchableData . '%')
                  ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}