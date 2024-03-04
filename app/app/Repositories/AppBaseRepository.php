<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AppBaseRepository {
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function paginatedData($perpage = 4){
        return $this->model->paginate($perpage);
    }
    public function show($id)
    {
        return $fetcheddData = $this->model->findOrFail($id);
    }
    public function update($id ,$validatedData){
        $toUpdate = $this->model->find($id);
        $toUpdate->update($validatedData);
    }
    public function store(array $validatedData){
        return $this->model->create($validatedData);
    }
    public function destroy($id){
        $toDelete = $this->model->find($id);
        return $toDelete->delete();
    }
} 