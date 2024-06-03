<?php

namespace App\Console\Commands\pkg_autorisations;

use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use App\Repositories\pkg_autorisations\ControllerRepository;
use App\Repositories\pkg_autorisations\GestionControllersRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use ReflectionClass;

class SyncControllers extends Command
{
    protected $signature = 'sync:Controllers';
    protected $description = 'Sync controllers from code to database';

    protected $controllerRepo;

    public function __construct(GestionControllersRepository $controllerRepo)
    {
        parent::__construct();
        $this->controllerRepo = $controllerRepo;
    }

    public function handle()
    {
        $this->controllerRepo->syncControllers();
        $this->info('Contrôleurs sont  synchronisés avec succès.');
    }

}
