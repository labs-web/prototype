<?php

namespace App\Http\Controllers\pkg_realisation_projet;

use App\Exceptions\pkg_realisation_projet\NatureLivrableAlreadyExistException;
use App\Repositories\pkg_realisation_projet\NatureLivrableRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\pkg_realisation_projet\NatureLivrable;
use Illuminate\Http\Request;
use App\Http\Requests\pkg_realisation_projet\NatureLivrableRequest;
use Carbon\Carbon;

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
            return redirect()->route('nature-livrables.index')->with('success', 'Nature Livrable added successfully');
        } catch (NatureLivrableAlreadyExistException $e) {
            return back()->withInput()->withErrors(['nature_livrable_exists' => 'A Nature Livrable with the same name already exists.']);
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function show(string $id)
    {
        $fetchedData = $this->natureLivrableRepository->find($id);
        return view('pkg_realisation_projet.nature_livrables.show', compact('fetchedData'));
    }

    public function edit(string $id)
    {
        $dataToEdit = $this->natureLivrableRepository->find($id);
        return view('pkg_realisation_projet.nature_livrables.edit', compact('dataToEdit'));
    }

    public function update(NatureLivrableRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->natureLivrableRepository->update($id, $validatedData);
        return redirect()->route('nature-livrables.index')->with('success', 'Nature Livrable updated successfully');
    }

    public function destroy(string $id)
    {
        $this->natureLivrableRepository->destroy($id);
        return redirect()->route('nature-livrables.index')->with('success', 'Nature Livrable deleted successfully');
    }
}

