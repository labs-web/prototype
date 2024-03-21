<?php

namespace Tests\Feature\Autorisation;

use App\Models\User;
use App\Models\Autorisation\Permission;
use App\Repositories\Autorisation\GestionPermissionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use DatabaseTransactions;

    protected $gestionPermissionsRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gestionPermissionsRepository = new GestionPermissionsRepository(new Permission);
        $this->user = User::factory()->create();
    }

    public function test_Get_Permissions()
    {
        $this->actingAs($this->user);
        $projectData = Permission::factory()->create();
        $Permissions = $this->gestionPermissionsRepository->paginate();
        $this->assertNotEmpty($Permissions);
    }

    public function test_Create_Permission()
    {
        $this->actingAs($this->user);
        $projectData = Permission::factory()->create();
        $PermissionData = [
            'name' => 'test',
            'guard_name' => 'test',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Permission = $this->gestionPermissionsRepository->create($PermissionData);
        $this->assertEquals($PermissionData['name'], $Permission->name);
    }

    public function test_Update_Permission()
    {
        $this->actingAs($this->user);
        $projectData = Permission::factory()->create();
        $PermissionData = [
            'name' => 'test',
            'guard_name' => 'test',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Permissions = $this->gestionPermissionsRepository->create($PermissionData);
        $PermissionData = [
            'name' => 'test',
            'guard_name' => 'test',
        ];
        $this->gestionPermissionsRepository->update($Permissions->id, $PermissionData);
        $this->assertDatabaseHas('Permissions', $PermissionData);
    }

    public function test_Delete_Permission()
    {
        $this->actingAs($this->user);
        $projectData = Permission::factory()->create();
        $PermissionData = [
            'name' => 'test',
            'guard_name' => 'test',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Permissions = $this->gestionPermissionsRepository->create($PermissionData);
        $this->gestionPermissionsRepository->destroy($Permissions->id);
        $this->assertDatabaseMissing('Permissions', ['id' => $Permissions->id]);
    }

    public function test_Search_Permission()
    {
        $this->actingAs($this->user);
        $projectData = Permission::factory()->create();
        $PermissionData = [
            'name' => 'test',
            'guard_name' => 'test',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Permissions = $this->gestionPermissionsRepository->create($PermissionData);
        $searchValue = 'test';
        $searchResults = $this->gestionPermissionsRepository->search($searchValue,$projectData->id);
        $this->assertTrue($searchResults->contains('name', $searchValue));
    }


}
