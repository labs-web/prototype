<?php

namespace App\Http\Controllers\Autorisation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Autorisation\GestionControllersRepository;
use App\Models\Autorisation\Controller as AutorisationController;

class GestionControllersController extends Controller
{


    protected $controllersRepository;

    public function __construct(GestionControllersRepository $controllersRepository){
        $this->controllersRepository = $controllersRepository;
    }


    public function index()
    {
        $controllers = $this->controllersRepository->paginate();
        return view('controllers.index', compact('controllers'));
    }

    public function create()
    {
        return view('controllers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:controllers|max:255',
        ]);

        $controller = AutorisationController::create($validatedData);
        return redirect()->route('controllers.index')->with('success', 'Controller created successfully');
    }

    public function edit(AutorisationController $controller)
    {
        return view('controllers.edit', compact('controller'));
    }

    public function update(Request $request, AutorisationController $controller)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:controllers,name,' . $controller->id . '|max:255',
            // Add more validation rules as needed
        ]);

        $controller->update($validatedData);
        return redirect()->route('controllers.index')->with('success', 'Controller updated successfully');
    }

    public function destroy(AutorisationController $controller)
    {
        $controller->delete();
        return redirect()->route('controllers.index')->with('success', 'Controller deleted successfully');
    }
}
