<?php

namespace App\Repositories\pkg_rh;

use App\Repositories\BaseRepository;
use App\Models\pkg_rh\Groupe;
use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_rh\Formateur;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Exceptions\pkg_rh\GroupAlreadyExistException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GroupRepositorie extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour les groupes.
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


     /**
     * Crée un nouveau group.
     *
     * @param array $data Données du groupe à créer.
     * @return mixed
     * @throws GroupAlreadyExistException Si le group existe déjà.
     */

     public function create(array $data)
     {

         $nom = $data['nom'];
     
         $existingGroup = $this->model->where('nom', $nom)->exists();
     
         if ($existingGroup) {
             throw GroupAlreadyExistException::createGroup();
         } else {
             $group = parent::create($data);
             if (isset($data['formateur_id'])) {
                 $formateur = Formateur::find($data['formateur_id']);
                 if ($formateur) {
                     $group->formateur()->associate($formateur);
                     $group->save();  // Save the association
                 }
             }
             if (isset($data['apprenant_ids']) && is_array($data['apprenant_ids'])) {
                 $group->apprenants()->sync($data['apprenant_ids']);
             }
             return $group;
         }
     }
     
     

     public function update($id, array $data)
     {
         $group = $this->model->findOrFail($id);
     
         $group->update($data);
     
         if (isset($data['formateur_id'])) {
             $formateur = Formateur::find($data['formateur_id']);
             if ($formateur) {
                 $group->formateur()->associate($formateur);
                 $group->save();  // Save the association
             }
         }
     
         if (isset($data['apprenant_ids'])) {
             $group->apprenants()->sync($data['apprenant_ids']);
         }
     
        ;
         
         return  $group->save();
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
    return $this->model->where(function($query) use ($searchableData) {
        foreach ($searchableData as $term) {
            $query->orWhere('nom', 'like', '%' . $term . '%')
                  ->orWhere('description', 'like', '%' . $term . '%');
        }
    })->paginate($perPage);
}





}
