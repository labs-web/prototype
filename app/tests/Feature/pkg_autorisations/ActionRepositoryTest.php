<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use App\Repositories\pkg_autorisations\ActionRepository;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Permission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
use Mockery;
use ReflectionClass;

class ActionRepositoryTest extends TestCase
{
    public function testSyncActions()
    {
        // Mock the File facade to return a fixed array of files
        $mockedFiles = [
            new class {
                public function getRelativePathname() {
                    return 'ExampleController.php';
                }
            }
        ];
        File::shouldReceive('allFiles')
            ->once()
            ->andReturn($mockedFiles);

        // Mock the App facade to return a specific path
        App::shouldReceive('path')
            ->with('Http/Controllers')
            ->andReturn('path/to/controllers');

        // Mock the Controller, Action, and Permission models
        $mockController = Mockery::mock('alias:App\Models\pkg_autorisations\Controller');
        $mockController->shouldReceive('firstOrCreate')
                       ->andReturn((object)['id' => 1]);

        $mockAction = Mockery::mock('alias:App\Models\pkg_autorisations\Action');
        $mockAction->shouldReceive('firstOrCreate')
                   ->andReturn((object)['id' => 1]);

        $mockPermission = Mockery::mock('alias:App\Models\pkg_autorisations\Permission');
        $mockPermission->shouldReceive('firstOrCreate')
                       ->andReturn((object)['id' => 1]);

        // Instantiate the repository and call the method
        $repository = new ActionRepository();
        $repository->syncActions();

        // Assertions can be more specific based on what you need to verify
        $this->assertTrue(true); // Dummy assertion for now
    }
}