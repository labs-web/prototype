<?php

namespace App\Http\Controllers\pkg_projets;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\pkg_projets\TacheRepository;

class TacheController extends AppBaseController
{
    protected $tacheRepository;
    public function __construct(TacheRepository $tacheRepository)
    {
        $this->tacheRepository = $tacheRepository;
    }

    public function index(Request $request)
    {
        $tachesData = $this->tacheRepository->paginate();
        return view('pkg_projets.kanban', compact('tachesData'));
    }
}
    