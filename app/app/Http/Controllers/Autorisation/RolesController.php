<?php

namespace App\Http\Controllers\Autorisation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Autorisation\RoleRequest;
use App\Repositories\Autorisation\RoleRepository;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request){
        $roles = $this->roleRepository->paginate();
        if($request->ajax()){
            $searchRole = $request->get('searchRole');
            $searchRole = str_replace(" ", "%", $searchRole);
            $Roles = $this->roleRepository->searchData($searchRole);
            return view('Autorisation.roles.index', compact('roles'))->render();
        }
        return view('Autorisation.roles.index', compact('roles'));
    }

    // create
    public function create(){
        return view('Autorisation.roles.create');
    }

    // store
    public function store(RoleRequest $request){
        $data = $request->validated();
        $this->roleRepository->create($data);
        return to_route('roles.index')->with('success','Role ajoutée avec succès.');
    }
    
    // edit
    public function edit($id){
        $role = $this->roleRepository->find($id);
        return view('Autorisation.roles.edit', compact('role'));
    }

    // update
    public function update(RoleRequest $request,$task_id){
        $data = $request->validated();
        $task = $this->roleRepository->update($task_id,$data);
        return to_route('roles.index')->with('success','Role mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $result = $this->roleRepository->destroy($id);
        if ($result) {
            return to_route('roles.index')>with('success', 'La Role a été supprimée avec succès.');
        } else {
            return to_route('roles.index')>with('error', 'Échec de la suppression de la Role. Veuillez réessayer.');
        }
    }
    
}

