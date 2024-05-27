<?php

namespace App\Http\Controllers\pkg_autorisations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pkg_autorisations\Action;
use App\Repositories\pkg_autorisations\GestionActionsRepository; // Add this line to import the GestionActionsRepository class
use App\Http\Requests\pkg_autorisations\ActionRequest;
use App\Repositories\pkg_autorisations\GestionControllersRepository;
use Illuminate\Support\Facades\Artisan;
use App\Exceptions\pkg_autorisations\ActionException; // Add this line to import the ActionException class
use auth;
class ActionController extends Controller
{

    protected $actionRepository;
    

    protected $controllerRepository;

    public function __construct(GestionActionsRepository $actionRepository, GestionControllersRepository $controllerRepository)
    {
        $this->actionRepository = $actionRepository;
        $this->controllerRepository = $controllerRepository;
    }
  
   

    public function index(Request $request)
{
    
    $controllers = $this->controllerRepository->all();
    $controllerFilter = $request->get('controller');
    $searchAction = $request->get('searchAction');

    $actions = $this->actionRepository->paginate();

    if ($controllerFilter) {
        $actions = $this->actionRepository->filterByController($controllerFilter);
    }

    if ($searchAction) {
        $actions = $this->actionRepository->search($searchAction);
    }

    if ($request->ajax()) {
        return view('pkg_autorisations.actions.index', compact('actions', 'controllers'))->render();
    }
    
    return view('pkg_autorisations.actions.index', compact('actions', 'controllers'));
}

 

    public function show(Request $request, $id)
    {
        $controller = $this->controllerRepository->find($id);
        $controllers = $this->actionRepository->filter();
        $actions = $controller->actions()->paginate();
        if ($request->ajax()) {
            $searchAction = $request->get('searchAction');
            $searchAction = str_replace(" ", "%", $searchAction);
            $actions = $this->actionRepository->searchData($searchAction, $id);
            return view('Autorisation.action.index', compact('actions', 'controllers', 'controller'))->render();
        }
        return view('Autorisation.action.index', compact('actions', 'controllers', 'controller'));
    }



    public function create()
    {
        $controllers = $this->actionRepository->filter();
        return view('pkg_autorisations.actions.create', compact('controllers'));
    }

    public function store(ActionRequest $request)
    {
        try {
            $data = $request->all();
            $this->actionRepository->create($data);
            return redirect()->route('actions.index')->with('success', __('pkg_autorisations/actions.success'));
        } catch (ActionException $e) {
            return redirect()->route('actions.create')->with('error', __('pkg_autorisations/actions.error'));
        } catch (\Exception $e) {
            return abort(500);
        }
    }
    

    public function edit($id)
    {
        $action = $this->actionRepository->find($id);
        $controllers = $this->actionRepository->filter();
        return view('pkg_autorisations.actions.edit', compact('action', 'controllers'));
    }

    public function update(Request $request, $action_id)
    {
        try {
            $data = $request->all();
            $action = $this->actionRepository->update($action_id, $data);
            return back()->with('success', __('pkg_autorisations/actions.update'));
        } catch (ActionException $e) {
            return back()->withInput()->withErrors(['Action_exists' => __('Autorisation/Action/message.updateActionException')]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['unexpected_error' => __('Autorisation/Action/message.unexpected_error')]);
        }
    }


    public function destroy($action_id)
    {
        $result = $this->actionRepository->destroy($action_id);
        if ($result) {
            return back()->with('success', 'L action a été supprimée avec succès.');
        } else {
            return back()->with('error', 'Échec de la suppression de l action. Veuillez réessayer.');
        }
    }
    public function SyncControllersActions()
    {
        Artisan::call('sync:ControllersActions');
        return redirect()->back()->with('success', 'Controllers and actions synced successfully.');
    }
}
