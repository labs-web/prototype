<?php

namespace App\Http\Controllers\projets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\projets\projetRequest;
use App\Repositories\projet\ProjetRepository;

class projetController extends Controller
{
    protected $projectRepository;
    public function __construct(ProjetRepository $projetRepository){
        $this->projectRepository = $projetRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     $projectData = $this->projectRepository->paginatedData(4);
     if($request->ajax()){
        $searchValue = $request->get('searchValue');
        $searchQuery = str_replace(' ' ,'%' , $searchValue);
        $responseData = $this->projectRepository->searchData($searchQuery);
        return view('projets/index' , compact('responseData'));
     }   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
