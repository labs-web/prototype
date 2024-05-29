<?php

namespace App\Http\Controllers\pkg_realisation_projet;

use App\Exceptions\pkg_realisation_projet\LivrableAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Models\pkg_realisation_projet\Livrable;
use Illuminate\Http\Request;
use App\Repositories\pkg_realisation_projet\LivrableRepository;
use App\Http\Controllers\AppBaseController;
use App\Exports\pkg_realisation_projet\LivrableExport;
use App\Imports\pkg_realisation_projet\LivrableImport;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Repositories\pkg_realisation_projet\NatureLivrableRepository;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log; // Added import for Log


class LivrableController extends AppBaseController
{
    protected $livrableRepository;

    public function __construct(LivrableRepository $livrableRepository)
    {
        $this->livrableRepository = $livrableRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $livrableData = $this->livrableRepository->searchData($searchQuery);
                return view('pkg_realisation_projet.livrable.index', compact('livrableData'))->render();
            }
        }
        $livrableData = $this->livrableRepository->paginate();
        return view('pkg_realisation_projet.livrable.index', compact('livrableData'));
    }

    public function create(NatureLivrableRepository $natureLivrableRepository, ProjetRepository $projetRepository)
    {
        $dataToEdit = null;
        $projects = $projetRepository->all();
        $natureLivrables = $natureLivrableRepository->all();
        return view('pkg_realisation_projet.livrable.create', compact(['dataToEdit', 'projects', 'natureLivrables']));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'titre' => 'required|string',
                'lien' => 'required|string',
                'description' => 'nullable|string',
                'nature_livrable_id' => 'required|integer',
                'projet_id' => 'required|integer'
            ]);
            $this->livrableRepository->create($validatedData);
            return redirect()->route('livrables.index')->with('success', 'Livrable ajouté avec succès.');
        } catch (LivrableAlreadyExistException $e) {
            return back()->withInput()->withErrors(['livrable_exists' => $e->getMessage()]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function show(string $id)
    {
        $fetchedData = $this->livrableRepository->find((int) $id);
        return view('pkg_realisation_projet.livrable.show', compact('fetchedData'));
    }

    public function edit(string $id, NatureLivrableRepository $natureLivrableRepository, ProjetRepository $projetRepository)
    {
        $projects = $projetRepository->all();
        $natureLivrables = $natureLivrableRepository->all();
        $dataToEdit = $this->livrableRepository->find((int) $id);
        return view('pkg_realisation_projet.livrable.edit', compact(['dataToEdit', 'projects', 'natureLivrables']));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string',
            'lien' => 'required|string',
            'description' => 'nullable|string',
            'nature_livrable_id' => 'required|integer',
            'projet_id' => 'required|integer'
        ]);
        $this->livrableRepository->update((int) $id, $validatedData);
        return redirect()->route('livrables.index', $id)->with('success', __('pkg_realisation_projet/livrable.singular') . ' ' . __('app.updateSucées'));
    }

    public function destroy(string $id)
    {
        $this->livrableRepository->destroy((int) $id);
        return redirect()->route('livrables.index')->with('success', 'Le livrable a été supprimer avec succés.');
    }

    public function export()
    {
        Log::info("Export function called"); // Log to check if this method is called

        $livrables = Livrable::all();
        Log::info("Number of livrables fetched: " . count($livrables)); // Check how many livrables are fetched

        if (count($livrables) == 0) {
            return redirect()->route('livrables.index')->with('error', 'No livrables available to export.');
        }

        return Excel::download(new LivrableExport($livrables), 'livrables_export.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new LivrableImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('livrables.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('livrables.index')->with('success', 'Livrables importés avec succès.');
    }
}
