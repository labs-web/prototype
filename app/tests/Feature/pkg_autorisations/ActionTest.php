<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActionTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Action;
    }
/**
 * Test the reading of an existing action.
 */
public function test_read_action(): void
{
    // Create a sample controller and permission for the action
    $controller = Controller::create(['nom' => 'TestController']);
    $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
    $existingAction = $this->model->create(['nom' => 'ExistingAction', 'controller_id' => $controller->id, 'permission_id' => $permission->id, 'parent_action_id' => null]);

    // Retrieve the action from the database
    $retrievedAction = Action::find($existingAction->id);

    // Assert that the retrieved action is not null and its 'nom' matches the existing action's 'nom'
    $this->assertNotNull($retrievedAction);
    $this->assertEquals($existingAction->nom, $retrievedAction->nom);
}
    /**
     * Test the creation of a new action.
     */
    public function test_create_action(): void
    {
        // Create a sample controller and permission for the action
        $controller = Controller::create(['nom' => 'TestController']);
        $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
        $data = ['nom' => "TestAction", 'controller_id' => $controller->id, 'permission_id' => $permission->id, 'parent_action_id' => null];
    
        $this->model->create($data);
        $this->assertDatabaseHas('actions', ['nom' => $data['nom']]);
    }
    
    /**
     * Test the update of an existing action.
     */
    public function test_update_action(): void
    {
        // Create a sample controller and permission for the action
        $controller = Controller::create(['nom' => 'TestController']);
        $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
        $existingAction = $this->model->create(['nom' => 'ExistingAction', 'controller_id' => $controller->id, 'permission_id' => $permission->id, 'parent_action_id' => null]);
    
        $newName = 'UpdatedAction';
        $existingAction->update(['nom' => $newName]);
    
        $this->assertEquals($newName, $existingAction->nom);
        $this->assertDatabaseHas('actions', ['nom' => $newName]);
    }
    
    /**
     * Test the deletion of an existing action.
     */
    public function test_delete_action(): void
    {
        // Create a sample controller and permission for the action
        $controller = Controller::create(['nom' => 'TestController']);
        $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
        $existingAction = $this->model->create(['nom' => 'ExistingAction', 'controller_id' => $controller->id, 'permission_id' => $permission->id, 'parent_action_id' => null]);
    
        $existingAction->delete();
    
        $this->assertDatabaseMissing('actions', ['id' => $existingAction->id]);
    }
    }
