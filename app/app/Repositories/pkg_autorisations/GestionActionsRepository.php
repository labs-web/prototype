<?php

namespace App\Repositories\pkg_autorisations;

use App\Models\pkg_autorisations\Action;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Artisan;
use ReflectionClass;
use ReflectionMethod;
use App\Exceptions\pkg_autorisations\ActionException;
use App\Models\pkg_autorisations\Controller;

class GestionActionsRepository extends BaseRepository {
    protected $model;

    public function __construct(Action $Action){
        $this->model = $Action;
    }

    public function find(int $id, array $columns = ['*']){
        return $this->model->find($id, $columns);
    }

    public function searchData($searchableData, $perPage = 0)
    {   
        if ($perPage == 0) { $perPage = $this->paginationLimit;}
        $query =  $this->allQuery($searchableData);
    }
    public function search($searchableData)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%');
        })->paginate(4);
    }

    public function create(array $data){
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->model->find($id);

        if (!$record) {
            return false;
        }

        return $record->update($data);
    }

    public function filter()
    {
        return Controller::all();
    }

    public function getFieldsSearchable(): array
    {
        // Define the fields that are searchable in your model
        return [
            'nom',
            'controller_id',
            'permission_id',
            'parent_action_id'
        ];
    }
}


