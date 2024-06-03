<?php
namespace App\Http\Controllers\pkg_autorisations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AppBaseController;
use App\Models\pkg_autorisations\Controller;
use App\Repositories\pkg_autorisations\GestionControllersRepository;

class GestionControllersController extends AppBaseController
{
    protected $controllersRepository;

    public function __construct(GestionControllersRepository $controllersRepository)
    {
        $this->controllersRepository = $controllersRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $controllers = $this->controllersRepository->searchData($searchQuery);
                return view('pkg_autorisations.controllers.index', compact('controllers'));
            }
        }

        $controllers = $this->controllersRepository->paginate();
        return view('pkg_autorisations.controllers.index', compact('controllers'));
    }

    public function create()
    {
        return view('pkg_autorisations.controllers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255'
        ]);

        try {
            $this->controllersRepository->create($validatedData);
            return redirect()->route('controllers.index')->with('success', 'Le contrôleur a été créé avec succès.');
        } catch (\Exception $e) {
            if ($e->getMessage() === 'ControllerNotExist') {
                return redirect()->back()->withErrors(['nom' => 'Le contrôleur n\'existe pas.'])->withInput();
            } elseif ($e->getMessage() === 'ControllerAlreadyExist') {
                return redirect()->back()->withErrors(['nom' => 'Le contrôleur existe déjà.'])->withInput();
            } else {
                Log::error('Erreur lors de la création du contrôleur : ' . $e->getMessage());
                return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la création du contrôleur. Veuillez réessayer plus tard.')->withInput();
            }
        }
    }

    public function edit(Controller $controller)
    {
        return view('pkg_autorisations.controllers.edit', compact('controller'));
    }

    public function update(Request $request, Controller $controller)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);

        try {
            $this->controllersRepository->update($controller->id, $validatedData);
            return redirect()->route('controllers.index')->with('success', 'Le contrôleur a été mis à jour avec succès.');
        } catch (\Exception $e) {
            if ($e->getMessage() === 'ControllerNotExist') {
                return redirect()->back()->withErrors(['nom' => 'Le contrôleur n\'existe pas.'])->withInput();
            } elseif ($e->getMessage() === 'ControllerAlreadyExist') {
                return redirect()->back()->withErrors(['nom' => 'Le contrôleur existe déjà.'])->withInput();
            } else {
                Log::error('Erreur lors de la mise à jour du contrôleur : ' . $e->getMessage());
                return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour du contrôleur. Veuillez réessayer plus tard.')->withInput();
            }
        }
    }

    public function destroy(Controller $controller)
    {
        try {
            $this->controllersRepository->destroy($controller->id);
            return redirect()->route('controllers.index')->with('success', 'Le contrôleur a été supprimé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du contrôleur : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression du contrôleur. Veuillez réessayer plus tard.');
        }
    }

    public function downloadSeeder(Request $request)
    {
        try {
            Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\pkg_autorisations\\ControllerSeeder']);
            return redirect()->route('controllers.index')->with('success', 'Le seeder a été téléchargé et exécuté avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'exécution du seeder : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors du téléchargement du seeder. Veuillez réessayer plus tard.');
        }
    }
    public function SyncControllers()
    {
        Artisan::call('sync:Controllers');
        return redirect()->back()->with('success','Contrôleurs sont  synchronisés avec succès.');
    }
}
