<?php

namespace App\Http\Controllers\pkg_competences;

use App\Exceptions\pkg_competences\categorietechnologieException;
use App\Exports\pkg_competences\CategorieTechnologieExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_competences\CategorieTechnologie;
use App\Imports\pkg_competences\CategorieTechnologieImport;
use App\Models\pkg_competences\CategorieTechnologie as Pkg_competencesCategorieTechnologie;
use App\Repositories\pkg_competences\categorietechnologieRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategorieTechnologieController extends Controller
{

    protected $CategorieTechnologie;
    public function __construct(categorietechnologieRepository $categorieTechnologie)
    {

        $this->CategorieTechnologie = $categorieTechnologie;
    }

    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $categorieTechnologiesData = $this->CategorieTechnologie->searchData($searchQuery);
                return view('pkg_competences.CategorieTechnologie.index', compact('categorieTechnologiesData'))->render();
            }
        }
        $categorieTechnologiesData = $this->CategorieTechnologie->paginate();
        return view('pkg_competences.CategorieTechnologie.index', compact('categorieTechnologiesData'));
    }

    public function create()
    {
        return view('pkg_competences.CategorieTechnologie.create');
    }

    public function store(CategorieTechnologie $request)
    {
        try {
            $data = $request->validated();
            $this->CategorieTechnologie->create($data);
            return redirect()->route('CategorieTechnologie.index')->with('success', 'Catégorie technologie  ' . __('app.addSucées'));
        } catch (categorietechnologieException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function show($id)
    {
        $fetchedData = $this->CategorieTechnologie->find($id);
        return view('pkg_competences.CategorieTechnologie.show', compact('fetchedData'));
    }
    public function edit($id)
    {
        $dataToEdit = $this->CategorieTechnologie->find($id);
        return view('pkg_competences.CategorieTechnologie.edit', compact('dataToEdit'));
    }

    public function update(CategorieTechnologie $request, $id)
    {
        try {
            $data = $request->validated();
            $this->CategorieTechnologie->update($id, $data);
            return redirect()->route('CategorieTechnologie.index')->with('success', 'Categorie Technologie ' . __('app.updateSucées'));
        } catch (categorietechnologieException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id){
        $this->CategorieTechnologie->destroy($id);
        return redirect()->route('CategorieTechnologie.index')->with('success', 'Categorie Technologie ' . __('app.deleteSucées'));
    }

    public function export()
    {
        $CategorieTechnologies = $this->CategorieTechnologie->all();

        return Excel::download(new CategorieTechnologieExport($CategorieTechnologies), 'CategorieTechnologie.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new CategorieTechnologieImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('CategorieTechnologie.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('CategorieTechnologie.index')->with('success', 'Categorie Technologie ' . __('app.addSucées'));
    }
}
