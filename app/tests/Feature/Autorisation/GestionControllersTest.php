<?php

namespace Tests\Feature\Autorisation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\GestionControllersRepository;
use App\Models\Autorisation\Controller as AutorisationController;
use Tests\TestCase;
use App\Models\User;


class GestionControllersTest extends TestCase
{
    use DatabaseTransactions;
    protected $ControllersRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ControllersRepository = new GestionControllersRepository(new AutorisationController);
        $this->user = User::factory()->create();
    }

    public function test_get_controllers()
    {
        $this->actingAs($this->user);
        AutorisationController::factory()->create();
        $controllers = $this->ControllersRepository->paginate();
        $this->assertNotNull($controllers);
        $this->assertNotEmpty($controllers);
    }


    public function test_create_controller()
    {
        $this->actingAs($this->user);
        $data = [
            'nom' => 'testController',
        ];
        $controller = $this->ControllersRepository->create($data);
        $this->assertEquals($data['nom'], $controller->nom);
        $this->assertDatabaseHas('controllers', [
            'nom' => 'testController'
        ]);
    }


    public function test_update_data(){
        $this->actingAs($this->user);
        $controller = AutorisationController::factory()->create();
        $Data = [
            'nom' => 'UpdateController',
        ];
        $this->ControllersRepository->update($controller->id , $Data);
        $this->assertDatabaseHas('controllers' , $Data);
    }


    public function test_delete_project(){
        $this->actingAs($this->user);
        $controller = AutorisationController::factory()->create();
        $this->ControllersRepository->destroy($controller->id);
        $this->assertDatabaseMissing('controllers' , ['id' => $controller->id]);
    }


}
