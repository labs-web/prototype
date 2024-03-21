<?php

namespace Tests\Feature\Autorisation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\GestionPermissionsRepository;
use App\Models\Autorisation\Controller as AutorisationController;
use Tests\TestCase;
use App\Models\User;


class GestionPermissionsTest extends TestCase
{
    use DatabaseTransactions;
    protected $PermissionsRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->PermissionsRepository = new GestionPermissionsRepository(new AutorisationController);
        $this->user = User::factory()->create();
    }

    public function test_get_controllers()
    {
        $this->actingAs($this->user);
        AutorisationController::factory()->create();
        $permissions = $this->PermissionsRepository->paginate();
        $this->assertNotNull($permissions);
        $this->assertNotEmpty($permissions);
    }


    public function test_create_controller()
    {
        $this->actingAs($this->user);
        $data = [
            'name' => 'testPermission',
            'guard_name' => 'web'
        ];
        $permission = $this->PermissionsRepository->create($data);
        $this->assertEquals($data['name'], $permission->name);
        $this->assertDatabaseHas('permission', [
            'name' => 'testPermission',
            'guard_name' => 'web'
        ]);
    }


    public function test_update_data(){
        $this->actingAs($this->user);
        $permission = AutorisationController::factory()->create();
        $Data = [
            'name' => 'UpdatePermission',
            'guard_name' => 'web'

        ];
        $this->PermissionsRepository->update($permission->id , $Data);
        $this->assertDatabaseHas('permissions' , $Data);
    }


    public function test_delete_project(){
        $this->actingAs($this->user);
        $permission = AutorisationController::factory()->create();
        $this->PermissionsRepository->destroy($permission->id);
        $this->assertDatabaseMissing('permissions' , ['id' => $permission->id]);
    }


}
