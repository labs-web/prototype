<?php

namespace App\Http\Controllers\pkg_realisation_projet;

use App\Exceptions\pkg_realisation_projet\NatureLivrableAlreadyExistException;
use App\Repositories\pkg_realisation_projet\NatureLivrableRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\pkg_realisation_projet\NatureLivrable;
use Illuminate\Http\Request;
use App\Http\Requests\pkg_realisation_projet\NatureLivrableRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\pkg_realisation_projet\NatureLivrableExport; 
use App\Imports\pkg_realisation_projet\NatureLivrableImport;


class NatureLivrableController extends AppBaseController
{
    protected $natureLivrableRepository;

    public function __construct(NatureLivrableRepository $natureLivrableRepository)
    {
        $this->natureLivrableRepository = $natureLivrableRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $natureLivrableData = $this->natureLivrableRepository->searchData($searchQuery);
                return view('pkg_realisation_projet.nature_livrables.index', compact('natureLivrableData'))->render();
            }
        }
        $natureLivrableData = $this->natureLivrableRepository->paginate();
        return view('pkg_realisation_projet.nature_livrables.index', compact('natureLivrableData'));
    }

    public function create()
    {
        $dataToEdit = null;
        return view('pkg_realisation_projet.nature_livrables.create', compact('dataToEdit'));
    }

    public function store(NatureLivrableRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $this->natureLivrableRepository->create($validatedData);
            return redirect()->route('nature-livrables.index')->with('success', 'Nature du Livrable ajoutée avec succès');
        } catch (NatureLivrableAlreadyExistException $e) {
            return back()->withInput()->withErrors(['nature_livrable_exists' => 'Nature du Livrable est déjà existante.']);
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function show(string $id)
    {
        $fetchedData = $this->natureLivrableRepository->find((int) $id);
        if (!$fetchedData) {
            return redirect()->route('nature-livrables.index')->with('error', 'Nature du Livrable not found.');
        }
        return view('pkg_realisation_projet.nature_livrables.show', compact('fetchedData'));
    }

    public function edit(string $id)
    {
        $dataToEdit = $this->natureLivrableRepository->find((int) $id);
        if (!$dataToEdit) {
            return redirect()->route('nature-livrables.index')->with('error', 'Nature du Livrable not found.');
        }
        return view('pkg_realisation_projet.nature_livrables.edit', compact('dataToEdit'));
    }

    public function update(NatureLivrableRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->natureLivrableRepository->update($id, $validatedData);
        return redirect()->route('nature-livrables.index')->with('success', 'Nature du Livrable mise à jour avec succès');
    }

    public function destroy(string $id)
    {
        $this->natureLivrableRepository->destroy($id);
        return redirect()->route('nature-livrables.index')->with('success', 'Nature du Livrable supprimée avec succès');
    }

    public function export(Request $request)
    {

        $data = NatureLivrable::all();
        return Excel::download(new NatureLivrableExport($data), 'nature_livrables.xlsx');
    }

    public function import(Request $request)
    {
        // dd('zaani');
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        try {
            Excel::import(new NatureLivrableImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('nature-livrables.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('nature-livrables.index')->with('success', __('pkg_realisation_projet/Nature_Livrables.plural') . ' ' . __('app.addSucées'));
    }
}

