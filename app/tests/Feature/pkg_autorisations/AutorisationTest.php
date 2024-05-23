<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use App\Models\pkg_autorisations\Autorisation;
use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;
use App\Models\pkg_autorisations\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AutorisationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test the creation of a new autorisation.
     */
public function test_create_autorisation(): void
{
    $controller = Controller::create(['nom' => 'TestController']);
    $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
    $action = Action::create(['nom' => 'TestAction', 'controller_id' => $controller->id, 'permission_id' => $permission->id]);

    $role = Role::create(['name' => 'TestRole', 'guard_name' => 'web']);

    $autorisation = Autorisation::create([
        'action_id' => $action->id,
        'role_id' => $role->id,
    ]);

    $this->assertDatabaseHas('autorisations', ['id' => $autorisation->id]);
}

public function test_read_autorisation(): void
{
    $controller = Controller::create(['nom' => 'TestController']);
    $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
    $action = Action::create(['nom' => 'TestAction', 'controller_id' => $controller->id, 'permission_id' => $permission->id]);

    $role = Role::create(['name' => 'TestRole', 'guard_name' => 'web']);
    $autorisation = Autorisation::create(['action_id' => $action->id, 'role_id' => $role->id]);

    $foundAutorisation = Autorisation::find($autorisation->id);

    $this->assertNotNull($foundAutorisation);
    $this->assertEquals($autorisation->id, $foundAutorisation->id);
}

public function test_update_autorisation(): void
{
    $controller = Controller::create(['nom' => 'TestController']);
    $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
    $action = Action::create(['nom' => 'TestAction', 'controller_id' => $controller->id, 'permission_id' => $permission->id]);

    $role = Role::create(['name' => 'TestRole', 'guard_name' => 'web']);
    $autorisation = Autorisation::create(['action_id' => $action->id, 'role_id' => $role->id]);

    $newRole = Role::create(['name' => 'NewRole', 'guard_name' => 'web']);
    $autorisation->update(['role_id' => $newRole->id]);

    $this->assertEquals($newRole->id, $autorisation->fresh()->role_id);
}

public function test_delete_autorisation(): void
{
    $controller = Controller::create(['nom' => 'TestController']);
    $permission = Permission::create(['name' => 'TestPermission', 'guard_name' => 'web']);
    $action = Action::create(['nom' => 'TestAction', 'controller_id' => $controller->id, 'permission_id' => $permission->id]);

    $role = Role::create(['name' => 'TestRole', 'guard_name' => 'web']);
    $autorisation = Autorisation::create(['action_id' => $action->id, 'role_id' => $role->id]);

    $autorisation->delete();

    $this->assertDatabaseMissing('autorisations', ['id' => $autorisation->id]);
}
}