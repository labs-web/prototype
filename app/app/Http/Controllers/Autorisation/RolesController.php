<?php

namespace App\Http\Controllers\Autorisation;

use App\Http\Controllers\Controller;
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
    
}

