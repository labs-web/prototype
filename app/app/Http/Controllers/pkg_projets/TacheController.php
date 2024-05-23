<?php

namespace App\Http\Controllers\pkg_projets;

use App\Http\Controllers\AppBaseController;
use App\Repositories\pkg_projets\TacheRepository;

class TacheController extends AppBaseController
{
    protected $tacheRepository;
    public function __construct(TacheRepository $tacheRepository)
    {
        $this->tacheRepository = $tacheRepository;
    }
}
