<?php

namespace App\Http\Controllers\Autorisation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Autorisation\GestionControllersRepository;
use App\Models\Autorisation\Controller as AutorisationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

class GestionControllersController extends Controller
{


    protected $controllersRepository;

    public function __construct(GestionControllersRepository $controllersRepository)
    {
        $this->controllersRepository = $controllersRepository;
    }


    public function index()
    {
        $controllers = $this->controllersRepository->paginate();
        return view('Autorisation.controllers.index', compact('controllers'));
    }

    public function create()
    {
        return view('Autorisation.controllers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|unique:controllers|max:255',
        ], [
            'nom.unique' => 'Le nom de Controller existe déjà.', // Custom error message for unique rule
        ]);

        $controllerName = $validatedData['nom'];

        // Check if the controller name exists in the extractControllerNames array
        if (in_array($controllerName, $this->extractControllerNames())) {
            $this->controllersRepository->create($validatedData);
            return redirect()->route('controllers.index')->with('success', 'Controller Mis à jour avec succés');
        } else {
            return redirect()->back()->withErrors(['nom' => 'Controller n\'existe pas dans la liste.'])->withInput();
        }
    }

    public static function extractControllerNames(): array
    {
        $extractControllerNames = [];
        // Loop through all routes
        foreach (Route::getRoutes() as $route) {
            $action = $route->getAction();
            // Check if the route has a controller key in its action
            if (array_key_exists('controller', $action)) {
                $fullControllerName = $action['controller'];
                // Check if the controller is in the correct namespace and does not belong to Auth namespace
                if (
                    strpos($fullControllerName, 'App\Http\Controllers\\') === 0 &&
                    strpos($fullControllerName, 'App\Http\Controllers\Auth\\') !== 0
                ) {
                    // Extract the controller class name without the namespace and method
                    $controllerNameWithNamespace = str_replace('App\Http\Controllers\\', '', $fullControllerName);
                    $controllerNameParts = explode('\\', $controllerNameWithNamespace);
                    $controllerClassName = end($controllerNameParts); // Get the last part (controller class name)
                    $controllerClassNameWithoutMethod = strtok($controllerClassName, '@');
                    $extractControllerNames[] = $controllerClassNameWithoutMethod;
                }
            }
        }
        // Remove duplicate controller names
        $uniqueControllerNames = array_unique($extractControllerNames);
        return $uniqueControllerNames;
    }

    public function edit(AutorisationController $controller)
    {
        return view('Autorisation.controllers.edit', compact('controller'));
    }

    public function update(Request $request, AutorisationController $controller)
    {
        $validatedData = $request->validate([
            'nom' => 'required|unique:controllers,nom,' . $controller->id . '|max:255',
        ], [
            'nom.required' => 'Le nom de Controller est requis.',
            'nom.unique' => 'Le nom de Controller doit être unique.',
        ]);

        $controllerName = $validatedData['nom'];

        // Check if the controller name exists in the extractControllerNames array
        if (in_array($controllerName, $this->extractControllerNames())) {
            $this->controllersRepository->update($controller->id, $validatedData);
            return redirect()->route('controllers.index')->with('success', 'Controller Mis à jour avec succés');
        } else {
            return redirect()->back()->withErrors(['nom' => 'Controller n\'existe pas dans la liste.'])->withInput();
        }
    }

    public function destroy(AutorisationController $controller)
    {
        $this->controllersRepository->destroy($controller->id);

        return redirect()->route('controllers.index')->with('success', 'Controller supprimé avec succès');
    }

    public function downloadSeeder(Request $request)
    {
        Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\Autorisation\\ControllerSeeder']);
        return redirect()->route('controllers.index')->with('success', 'Seeder téléchargé avec succès');
    }
}
