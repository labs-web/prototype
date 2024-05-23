<?php

namespace Tests\Feature\pkg_autorisations;

use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Mockery;use Tests\TestCase;

class SyncActionsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Ensure the tables exist in the database
        $this->artisan('migrate');
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_syncs_controllers_and_actions_and_creates_permissions()
    {
        // Mock the files in the Controllers directory
        $controllerPath = app_path('Http/Controllers');
        File::shouldReceive('allFiles')
            ->once()
            ->with($controllerPath)
            ->andReturn([
                (object) ['getRelativePathname' => 'SampleController.php']
            ]);

        // Mock the class existence check
        $this->app->bind('App\Http\Controllers\SampleController', function () {
            return new class {
                public function sampleMethod() {}
            };
        });

        // Execute the command
        Artisan::call('sync:ControllersActions');

        // Verify the Controller is created
        $controller = Controller::where('nom', 'SampleController')->first();
        $this->assertNotNull($controller);

        // Verify the Action is created
        $action = Action::where('nom', 'sampleMethod')
            ->where('controller_id', $controller->id)
            ->first();
        $this->assertNotNull($action);

        // Verify the Permission is created
        $permissionName = 'sampleMethod-SampleController';
        $permission = Permission::where('name', $permissionName)->first();
        $this->assertNotNull($permission);

        // Verify the Action is updated with the permission ID and parent_action_id
        $this->assertEquals($permission->id, $action->permission_id);
        $this->assertEquals($action->id, $action->parent_action_id); // Verify the parent_action_id is set correctly
    }
}
