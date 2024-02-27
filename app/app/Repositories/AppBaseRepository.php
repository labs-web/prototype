<?php

namespace App\Repository\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AppBaseRepository {
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function paginatedData($perpage){
        return $this->model->paginate($perpage);
    }
    public function update($Obj,$validatedData){
        $dataToUpdate = $this->model->findOrFail($Obj->id);
        $dataToUpdate->update($validatedData);
    }
    public function store($validatedData){
        return $this->model->create($validatedData);
    }
    public function destroy($Obj){
        $toDelete = $this->model->find($Obj->id);
        return $toDelete->delete();
    }
}