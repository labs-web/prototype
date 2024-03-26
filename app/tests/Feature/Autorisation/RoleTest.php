<?php

namespace Tests\Feature\Autorisation;

use App\Exceptions\Autorisation\RoleException;
use App\Exceptions\RoleExceptions;
use App\Models\Autorisation\Role;
use App\Repositories\Autorisation\RoleRepository;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseTransactions;
    protected $roleRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->roleRepository = new RoleRepository(new Role);
        $this->user = User::factory()->create();
    }

    public function test_paginate_role()
    {
        $this->actingAs($this->user);
        $role = Role::factory()->create();
        $roles = $this->roleRepository->paginate();
        $this->assertNotNull($roles);
        $this->assertNotEmpty($roles);
    }

    public function test_create_role_if_name_not_exists()
    {
        $this->actingAs($this->user);
        $roleData = [
            'name' => 'test',
            'guard_name' => 'web',
        ];
        $role = $this->roleRepository->create($roleData);
        $this->assertEquals($roleData['name'], $role->name);
    }

    public function test_create_role_if_name_exists()
    {
        $this->actingAs($this->user);
        $existingRole = Role::factory()->create(); // Create an existing role

        $roleData = [
            'name' => $existingRole->name, // Use the name of the existing role
            'guard_name' => 'web',
        ];

        try {
            $this->roleRepository->create($roleData); // Attempt to create a role with duplicate name
            $this->fail('Expected RoleException was not thrown');
        } catch (RoleException $e) {
            $this->assertEquals(__('Autorisation/roles/message.createRoleException'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }

    public function test_update_role()
    {
        $this->actingAs($this->user);
        $role = Role::factory()->create();
        $roleData = [
            'name' => 'admins',
            'guard_name' => 'web',
        ];
        $this->roleRepository->update($role->id, $roleData);
        $this->assertDatabaseHas('roles', $roleData);
    }


    public function test_delete_role()
    {
        $this->actingAs($this->user);
        $role = Role::factory()->create();
        $this->roleRepository->destroy($role->id);
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    public function test_searchData_role()
    {
        $this->actingAs($this->user);
        $roleData = [
            'name' => 'test',
            'guard_name' => 'web',
        ];
        $this->roleRepository->create($roleData);
        $searchValue = 'test';
        $searchResults = $this->roleRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('name', $searchValue));
    }
}
