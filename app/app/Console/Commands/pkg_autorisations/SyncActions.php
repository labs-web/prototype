<?php

namespace App\Console\Commands\pkg_autorisations;

use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use App\Repositories\pkg_autorisations\ActionRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use ReflectionClass;
use ReflectionMethod;

class SyncActions extends Command
{
    protected $signature = 'sync:ControllersActions';
    protected $description = 'Sync controllers and actions from code to database';

    protected $actionRepo;

    public function __construct(ActionRepository $actionRepo)
    {
        parent::__construct();
        $this->actionRepo = $actionRepo;
    }

    public function handle()
    {
        $this->actionRepo->syncActions();
        $this->info('Controllers and actions synced successfully.');
    }
}
