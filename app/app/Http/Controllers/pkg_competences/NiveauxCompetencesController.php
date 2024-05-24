<?php

namespace App\Http\Controllers\pkg_competences;

use App\Exceptions\pkg_competences\NiveauxCompetencesAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Imports\pkg_competences\NiveauxCompetencesImport;
use App\Exports\pkg_competences\NiveauxCompetencesExport;
use App\Models\pkg_competences\NiveauCompetence;
use Illuminate\Http\Request;
use App\Http\Requests\pkg_competences\NiveauxCompetencesRequest;
use App\Repositories\pkg_competences\niveauxCompetencesRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class NiveauxCompetencesController extends AppBaseController
{
    protected $niveauxCompetencesRepository;
    public function __construct(niveauxCompetencesRepository $niveauxCompetencesRepository)
    {
        $this->niveauxCompetencesRepository = $niveauxCompetencesRepository;
    }

    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $niveauxCompetencesData = $this->niveauxCompetencesRepository->searchData($searchQuery);
                return view('pkg_competences.niveauxCompetences.index', compact('niveauxCompetencesData'))->render();
            }
        }
        $niveauxCompetencesData = $this->niveauxCompetencesRepository->paginate();
        return view('pkg_competences.niveauxCompetences.index', compact('niveauxCompetencesData'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('pkg_competences.niveauxCompetences.create', compact('dataToEdit'));
    }


    public function store(NiveauxCompetencesRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $this->niveauxCompetencesRepository->create($validatedData);
            return redirect()->route('pkg_competences.niveauxCompetencess.index')->with('success',__('pkg_competences/niveauxCompetence.singular').' '.__('app.addSucées'));

        } catch (NiveauxCompetencesAlreadyExistException $e) {
            return back()->withInput()->withErrors(['project_exists' =>'Niveau competence already existe']);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(int $id)
    {
        $fetchedData = $this->niveauxCompetencesRepository->find($id);
        return view('pkg_competences.niveauxCompetences.show', compact('fetchedData'));
    }


    public function edit(int $id)
    {
        $dataToEdit = $this->niveauxCompetencesRepository->find($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');

        return view('pkg_competences.niveauxCompetences.edit', compact('dataToEdit'));
    }


    public function update(NiveauxCompetencesRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $this->niveauxCompetencesRepository->update($id, $validatedData);
        return redirect()->route('niveauxCompetences.index', $id)->with('success',__('pkg_competences/niveauxCompetence.singular').' '.__('app.updateSucées'));
    }


    public function destroy(int $id)
    {
        $this->niveauxCompetencesRepository->destroy($id);
        return redirect()->route('niveauxCompetences.index')->with('success', 'Le niveaux Competences a été supprimer avec succés.');
    }


    public function export()
    {
        $niveauxCompetences = NiveauCompetence::all();

        return Excel::download(new NiveauxCompetencesExport($niveauxCompetences), 'niveauxCompetences_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new NiveauxCompetencesImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('niveauxCompetences.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('niveauxCompetences.index')->with('success',__('pkg_competences/niveauxCompetence.singular').' '.__('app.addSucées'));
    }
}