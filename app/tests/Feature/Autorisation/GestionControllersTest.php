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

    public function test_paginate_controllers()
    {
        $this->actingAs($this->user);
        AutorisationController::factory()->create();
        $controllers = $this->ControllersRepository->paginate();
        $this->assertNotNull($controllers);
        $this->assertNotEmpty($controllers);
    }

        public function test_create_controller_not_exist()
        {
            $this->actingAs($this->user);
            $data = [
                'nom' => 'testController',
            ];
            try {
                $this->ControllersRepository->create($data);
                $this->fail('Exception attendue non levée.');
            } catch (\Exception $e) {
                $this->assertInstanceOf(\Exception::class, $e);
            }
        }


        public function test_update_controller_not_exist(){
            $this->actingAs($this->user);
            $controller = AutorisationController::factory()->create();
            $Data = [
                'nom' => 'UpdateController',
            ];
            try {
                $this->ControllersRepository->update($controller->id , $Data);
                $this->fail('Exception attendue non levée.');
            } catch (\Exception $e) {
                $this->assertInstanceOf(\Exception::class, $e);
            }
        }


    public function test_delete_controller(){
        $this->actingAs($this->user);
        $controller = AutorisationController::factory()->create();
        $this->ControllersRepository->destroy($controller->id);
        $this->assertDatabaseMissing('controllers' , ['id' => $controller->id]);
    }

}
