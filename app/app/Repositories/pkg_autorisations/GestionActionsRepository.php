<?php

namespace App\Repositories\pkg_autorisations;

use App\Models\pkg_autorisations\Action ;
use App\Models\pkg_autorisations\Controller ;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Artisan;
use ReflectionClass;
use ReflectionMethod;
use App\Exceptions\pkg_autorisations\ActionException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class GestionActionsRepository extends BaseRepository {
    protected $model;
    public function getFieldsSearchable(): array {
        return ['nom', 'controller_id'];
    }

    public function __construct(Action $Action){
        $this->model = $Action;
    }
    public function find(int $id, array $columns = ['*'])
    {
        return $this->model->with('controller')->find($id, $columns);
    }
    

    public function searchData($searchableData, $perPage = 0): LengthAwarePaginator
{
    if ($perPage == 0) { 
        $perPage = $this->paginationLimit;
    }

    return $this->model->where('controller_id', $searchableData)
                       ->where('nom', 'like', '%' . $searchableData . '%')
                       ->paginate($perPage);
}

    

     public function search($searchableData)
     {
         return $this->model->where(function ($query) use ($searchableData) {
             $query->where('nom', 'like', '%' . $searchableData . '%');
         })->paginate(4);
     }


    public function create($data)
    {
        $existingAction = $this->model->where('nom', $data['nom'])
                                     ->where('controller_id', $data['controller_id'])
                                     ->first();

        if ($existingAction) {
            throw new ActionException('Autorisation/action/message.createActionException');
        }
        return $this->model->create($data);
    }

     public function filter()
     {
        return Controller::all();
     }





}
