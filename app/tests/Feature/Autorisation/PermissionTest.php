<?php

namespace Tests\Feature\Autorisation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\GestionPermissionsRepository;
use App\Models\Autorisation\Permission ;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;


    /**
     * A basic feature test example.
     */
    class PermissionTest extends TestCase
    {
        use DatabaseTransactions;
        protected $permissionsRepository;
        protected $permission;
    
        protected function setUp(): void
        {
            parent::setUp();
            $this->permissionsRepository = app(GestionPermissionsRepository::class); // Inject the repository
            $this->permission = Permission::factory()->create();
        }
    
        public function test_get_permissions()
        {
            $this->actingAs($this->permission);
            Permission::factory()->create();
            $permissions = $this->permissionsRepository->paginate();
            $this->assertNotNull($permissions);
            $this->assertNotEmpty($permissions);
        }
    
    
        public function test_create_permission()
        {
            $this->actingAs($this->permission);
            $data = [
                'name' => 'testPermission',
            ];
            $permission = $this->permissionsRepository->create($data);
            $this->assertEquals($data['name'], $permission->name);
            $this->assertDatabaseHas('permissions', [
                'name' => 'testPermission',
            ]);
        }
    
    
        public function test_update_data(){
            $this->actingAs($this->permission);
            $permission = Permission::factory()->create();
            $Data = [
                'name' => 'UpdatePermission',
    
            ];
            $this->permissionsRepository->update($permission->id , $Data);
            $this->assertDatabaseHas('permissions' , $Data);
        }
    
    
        public function test_delete_project(){
            $this->actingAs($this->permission);
            $permission = Permission::factory()->create();
            $this->permissionsRepository->destroy($permission->id);
            $this->assertDatabaseMissing('permissions' , ['id' => $permission->id]);
        }
    
    
    }

