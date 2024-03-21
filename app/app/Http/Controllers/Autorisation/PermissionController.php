<?php

namespace App\Http\Controllers\Autorisation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Autorisation\GestionPermissionsRepository; // Add this line to import the GestionPermissionsRepository class
use App\Http\Requests\Autorisation\PermissionRequest;
use App\Repositories\Autorisation\GestionControllersRepository;

class PermissionController extends Controller
{
    protected $gestionPermissionsRepository;

    public function __construct(GestionPermissionsRepository $gestionPermissionsRepository

    ){
        $this->gestionPermissionsRepository = $gestionPermissionsRepository;
}
    public function index(Request $request){
        $controller = $this->gestionPermissionsRepository->filter();
        $permission = $this->gestionPermissionsRepository->paginate();
        if($request->ajax()){
            $searchPermission = $request->get('searchPermission');
            $searchPermission = str_replace(" ", "%", $searchPermission);
            $permission = $this->gestionPermissionsRepository->search($searchPermission);
            return view('GestionProjets.Permission.index', compact('permission','controller'))->render();
        }
        return view('GestionProjets.Permission.index', compact('permission', 'controller'));
    }





    public function create(){
        $controller = $this->gestionPermissionsRepository->filter();
        return view('GestionProjets.Permission.create',compact('controller'));
    }

    public function store(PermissionRequest $request)
    {
        $controller = $request->get('controller'); // Assuming the controller input name is 'controller'
        $action = $request->get('action'); // Assuming the action input name is 'action'
    
        $combinedName = "$action-$controller";
    
        $data = $request->except(['controller', 'action']); // Exclude controller and action from data
        $data['name'] = $combinedName; // Add combined name to data
    
        $permission = $this->gestionPermissionsRepository->create($data);
    
        return back()->with('success', 'Permission ajoutée avec succès.');
    }
    

    public function edit($id){
        $Permission = $this->gestionPermissionsRepository->find($id);
        $controller = $this->gestionPermissionsRepository->filter();
        return view('GestionProjets.Permission.edit',compact('Permission','controller'));
    }

    public function update(Request $request,$Permission_id){
        $data = $request->all();
        $Permission = $this->gestionPermissionsRepository->update($Permission_id,$data);
        return back()->with('success','Permission mise à jour avec succès.');
    }

    
    public function destroy($Permission_id)
    {
        $result = $this->gestionPermissionsRepository->destroy($Permission_id);
        if ($result) {
            return back()->with('success', 'La Permission a été supprimée avec succès.');
        } else {
            return back()->with('error', 'Échec de la suppression de la Permission. Veuillez réessayer.');
        }
    }


}