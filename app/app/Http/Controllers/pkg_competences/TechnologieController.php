<?php

namespace App\Http\Controllers\Pkg_competences;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\pkg_competences\Competence;
use App\Http\Controllers\AppBaseController;
use App\Models\pkg_competences\Technologie;
use App\Exports\pkg_competences\TechnologieExport;
use App\Imports\pkg_competences\TechnologieImport;
use App\Models\pkg_competences\CategorieTechnologie;
use App\Http\Requests\pkg_competences\TechnologieRequest;
use App\Repositories\Pkg_competences\TechnologieRepository;
use App\Exceptions\pkg_competences\TechnologieAlreadyExistException;

class TechnologieController extends AppBaseController
{
    protected $TechnologieRepository;
    protected $CategorieTechnologie;
    protected $Competence;
    public function __construct(TechnologieRepository $technologieRepository, CategorieTechnologie $categorieTechnologie, Competence $competence)
    {

        $this->TechnologieRepository = $technologieRepository;
        $this->CategorieTechnologie = $categorieTechnologie;
        $this->Competence = $competence;
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $technologieData = $this->TechnologieRepository->searchData($searchQuery);
                return view('Pkg_competences.Technologie.index', compact('technologieData'))->render();
            }
        }
        $technologieData = $this->TechnologieRepository->paginate();
        return view('Pkg_competences.Technologie.index', compact('technologieData'));
    }


    public function create()
    {
        $dataToEdit = null;
        $CategorieTechnologie = $this->CategorieTechnologie::all();
        $Competence = $this->Competence::all();
        return view('Pkg_competences.Technologie.create', compact('dataToEdit', 'CategorieTechnologie', 'Competence'));
    }


    public function store(TechnologieRequest $request)
    {

        try {
            $validatedData = $request->validated();
            // dd($validatedData);
            $this->TechnologieRepository->create($validatedData);
            return redirect()->route('technologie.index')->with('success', __('messages.create_success'));

        } catch (TechnologieAlreadyExistException $e) {
            return back()->withInput()->withErrors(['technologie_exists' => 'Technologie est déjà existant']);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(string $id)
    {
        $fetchedData = $this->TechnologieRepository->find($id);
        return view('Pkg_competences.Technologie.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $CategorieTechnologie = $this->CategorieTechnologie::all();
        $Competence = $this->Competence::all();
        $dataToEdit = $this->TechnologieRepository->find($id);
        return view('Pkg_competences.Technologie.edit', compact('dataToEdit', 'CategorieTechnologie', 'Competence'));
    }


    public function update(TechnologieRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->TechnologieRepository->update($id, $validatedData);
        return redirect()->route('technologie.index', $id)->with('success', __('messages.update_success'));
    }


    public function destroy(string $id)
    {
        $this->TechnologieRepository->destroy($id);
        return redirect()->route('technologie.index')->with('success', __('messages.delete_success'));
    }


    public function export()
    {
        $projects = Technologie::all();

        return Excel::download(new TechnologieExport($projects), 'technologie_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new TechnologieImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('technologie.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('technologie.index')->with('success', __('Pkg_competences.Technologie.singular') . ' ' . __('app.addSucées'));
    }
}