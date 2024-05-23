<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SyncActionsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test the handle function of SyncActions command.
     */
    public function testHandleSyncActions()
    {
        // Prepare mock data
        $controllerName = 'SampleController';
        $methodName = 'sampleMethod';

        // Mock the File facade to return a specific file array structure
        File::shouldReceive('allFiles')
            ->once()
            ->andReturn(collect([
                new class {
                    public function getRelativePathname() {
                        return 'SampleController.php';
                    }
                }
            ]));

        // Ensure the class and method exist
        eval('namespace App\Http\Controllers; class SampleController { public function sampleMethod() {} }');

        // Run the artisan command
        Artisan::call('sync:ControllersActions');

        // Assertions to ensure data was inserted into the database
        $controller = Controller::where('nom', $controllerName)->first();
        $this->assertNotNull($controller, 'Controller should be created');

        $action = Action::where([
            'nom' => $methodName,
            'controller_id' => $controller->id
        ])->first();
        $this->assertNotNull($action, 'Action should be created');

        $permissionName = "{$methodName}-{$controllerName}";
        $permission = Permission::where('name', $permissionName)->first();
        $this->assertNotNull($permission, 'Permission should be created');

        // Check if the action is linked to the permission
        $this->assertEquals($permission->id, $action->permission_id, 'Action should have the correct permission ID');
    }
}

