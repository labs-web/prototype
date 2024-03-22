<?php

namespace App\Http\Controllers\Autorisation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Autorisation\GestionActionsRepository; // Add this line to import the GestionActionsRepository class
use App\Http\Requests\Autorisation\ActionRequest;
use App\Repositories\Autorisation\GestionControllersRepository;

class ActionController extends Controller
{
    protected $gestionActionsRepository;

    public function __construct(GestionActionsRepository $gestionActionsRepository

    ){
        $this->gestionActionsRepository = $gestionActionsRepository;
}
    public function index(Request $request){
        $action = $this->gestionActionsRepository->paginate();
        if($request->ajax()){
            $searchAction = $request->get('searchAction');
            $searchAction = str_replace(" ", "%", $searchAction);
            $action = $this->gestionActionsRepository->search($searchAction);
            return view('Autorisation.Action.index', compact('action'))->render();
        }
        return view('Autorisation.Action.index', compact('action'));
    }





    public function create(){
        $controller = $this->gestionActionsRepository->filter();
        return view('Autorisation.Action.create',compact('controller'));
    }

    public function store(ActionRequest $request)
    {
        $data = $request->all();
    
        $action = $this->gestionActionsRepository->create($data);
    
        return back()->with('success', 'Action ajoutée avec succès.');
    }
    

    public function edit($id){
        $action = $this->gestionActionsRepository->find($id);
        $controller = $this->gestionActionsRepository->filter();
        return view('Autorisation.Action.edit',compact('action','controller'));
    }

    public function update(Request $request,$Action_id){
        $data = $request->all();
        $Action = $this->gestionActionsRepository->update($Action_id,$data);
        return back()->with('success','Action mise à jour avec succès.');
    }

    
    public function destroy($Action_id)
    {
        $result = $this->gestionActionsRepository->destroy($Action_id);
        if ($result) {
            return back()->with('success', 'La Action a été supprimée avec succès.');
        } else {
            return back()->with('error', 'Échec de la suppression de la Action. Veuillez réessayer.');
        }
    }


}