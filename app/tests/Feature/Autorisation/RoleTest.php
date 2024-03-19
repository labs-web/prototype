<?php

namespace Tests\Feature\Autorisation;

use App\Models\Autorisation\Role;
use App\Repositories\Autorisation\RoleRepository;
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

    public function test_get_paginated_role()
    {
        $this->actingAs($this->user);
        $role = Role::factory()->create();
        $roles = $this->roleRepository->paginate();
        $this->assertNotNull($roles);
        $this->assertNotEmpty($roles);
    }


    public function test_create_role()
    {
        $this->actingAs($this->user);
        $roleData = [
            'name' => 'admin',
            'guard_name' => 'web',
            'date_debut' => '2023-10-10 16:22:14',
            'date_de_fin' => '2024-03-02 16:22:14',
        ];
        $role = $this->roleRepository->create($roleData);
        $this->assertEquals($roleData['name'], $role->name);
    }


    public function test_update_data(){
        $this->actingAs($this->user);
        $role = Role::factory()->create();
        $roleData = [
            'name' => 'role update test',
            'description' => 'role update test',
            'date_debut' => '2023-10-10 16:22:14',
            'date_de_fin' => '2024-03-02 16:22:14',
        ];
        $this->roleRepository->update($role->id , $roleData);
        $this->assertDatabaseHas('role' , $roleData);
    }


    public function test_delete_role(){
        $this->actingAs($this->user);
        $role = Role::factory()->create();
        $this->roleRepository->destroy($role->id);
        $this->assertDatabaseMissing('role' , ['id' => $role->id]);
    }

    public function test_role_search(){
        $this->actingAs($this->user);
        $roleData = [
            'name' => 'admin',
            'guard_name' => 'web',
            'date_debut' => '2023-10-10 16:22:14',
            'date_de_fin' => '2024-03-02 16:22:14',
        ];
        $this->roleRepository->create($roleData);
        $searchValue = 'admin';
        $searchResults = $this->roleRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('name', $searchValue));
    }

}

