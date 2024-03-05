<?php

namespace App\Http\Controllers\GestionProjets;

use App\Http\Controllers\Controller;
use App\Imports\GestionProjets\ProjetImport;
use Illuminate\Http\Request;
use App\Http\Requests\GestionProjets\projetRequest;
use App\Repositories\GestionProjets\ProjetRepository;
use Carbon\Carbon;
use App\Exports\GestionProjets\projetExport;
use Maatwebsite\Excel\Facades\Excel;

class projetController extends Controller
{
    protected $projectRepository;
    public function __construct(ProjetRepository $projetRepository)
    {
        $this->projectRepository = $projetRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projectData = $this->projectRepository->paginatedData(4);
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if($searchValue !== ''){
                $searchQuery = str_replace(' ', '%', $searchValue);
            $projectData = $this->projectRepository->searchData($searchQuery);
            return view('GestionProjets.projets.index', compact('projectData'))->render();
            }
            
        }
        return view('GestionProjets.projets.index', compact('projectData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataToEdit = null;
        return view('GestionProjets.projets.create', compact('dataToEdit'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(projetRequest $request)
    {
        $validatedData = $request->validated();
        $this->projectRepository->store($validatedData);
        return redirect()->route('projets.create')->with('success', 'Le projet a été ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fetchedData = $this->projectRepository->show($id);
        return view('GestionProjets.projets.show', compact('fetchedData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataToEdit = $this->projectRepository->show($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');

        return view('GestionProjets.projets.edit', compact('dataToEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(projetRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->projectRepository->update($id, $validatedData);
        return redirect()->route('projets.edit', $id)->with('success', 'Le projet a été modifier avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->projectRepository->destroy($id);
        $projectData = $this->projectRepository->paginatedData(4);
        return view('GestionProjets.projets.index', compact('projectData'))->with('succes', 'Le projet a été supprimer avec succés.');
    }
    public function export()
    {
        $perPage = PHP_INT_MAX;
        $projects = $this->projectRepository->paginatedData($perPage);

        return Excel::download(new ProjetExport($projects), 'projet_export.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new ProjetImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('projets.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('projets.index')->with('success', 'Projet a ajouté avec succès');
    }

}






