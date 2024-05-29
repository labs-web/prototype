<?php
namespace App\Repositories\pkg_competences;

use App\Exceptions\pkg_competences\categorietechnologieException;
use App\Models\pkg_competences\categorietechnologie;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class categorietechnologieRepository extends BaseRepository
{
        /**
     * Les champs de recherche disponibles pour les projets.
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
     * Constructeur de la classe ProjetRepository.
     */
    public function __construct()
    {
        parent::__construct(new categorietechnologie());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];

        $categorietechnologieExist =  $this->model->where('nom', $nom)->exists();

        if ($categorietechnologieExist) {
            throw categorietechnologieException::AlreadyExistCategorieTechnlogie();
        } else {
            return parent::create($data);
        }
    }

    public function update($id, array $data)
    {
        $nom = $data['nom'];

        $categorietechnologieExist =  $this->model->where('nom', $nom)->where('id', '!=', $id)->exists();

        if ($categorietechnologieExist) {
            throw categorietechnologieException::AlreadyExistCategorieTechnlogie();
        } else {
            return parent::update($id, $data);
        }
    }

    public function destroy($id)
    {
        $categorietechnologieExist =  $this->model->find($id);

        if (!$categorietechnologieExist) {
            throw categorietechnologieException::NotExistCategorieTechnlogie();
        } else {
            return parent::destroy($id);
        }
    }

        /**
     * Recherche les projets correspondants aux critères spécifiés.
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
