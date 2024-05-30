<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\pkg_autorisations\Controller;
use App\Exceptions\pkg_autorisations\ControllerExceptions;
use App\Repositories\pkg_autorisations\GestionControllersRepository;
use App\Models\pkg_autorisations\Controller as AutorisationController;

class ControllersTest extends TestCase
{
    use DatabaseTransactions;

    protected $ControllersRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ControllersRepository = new GestionControllersRepository(new AutorisationController());
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

    public function test_create_controller()
    {
        $this->actingAs($this->user);
        $controllerNames = $this->ControllersRepository->extractControllerNames();
        $existingControllers = $this->ControllersRepository->getModel()::whereIn('nom', $controllerNames)->pluck('nom')->toArray();

        if (count($existingControllers) == count($controllerNames)) {
            $controllerToRemove = array_pop($existingControllers); // Remove one controller name
            $this->ControllersRepository->getModel()::where('nom', $controllerToRemove)->delete(); // Remove it from the database
        } else {
            $nonExistingController = array_diff($controllerNames, $existingControllers);
            $controllerToCreate = reset($nonExistingController); // Get the first non-existing controller
        }

        $data = ['nom' => $controllerToCreate ?? $controllerToRemove];
        $this->ControllersRepository->create($data);

        $this->assertTrue(true);
        $this->assertDatabaseHas('controllers', ['nom' => $data['nom']]);
    }

    public function test_create_controller_not_exist()
    {
        $this->actingAs($this->user);
        $data = ['nom' => 'NonExistentController'];

        $this->expectException(ControllerExceptions::class);

        $this->ControllersRepository->create($data);
    }

    public function test_update_controller()
    {
        $this->actingAs($this->user);

        $controllerNames = $this->ControllersRepository->extractControllerNames();
        $existingControllers = $this->ControllersRepository->getModel()::whereIn('nom', $controllerNames)->pluck('nom')->toArray();

        if (!empty($existingControllers)) {
            $controllerToUpdate = $existingControllers[array_rand($existingControllers)];
        } else {
            $newControllerName = $controllerNames[array_rand($controllerNames)];
            $data = ['nom' => $newControllerName];
            $this->ControllersRepository->create($data);
            $controllerToUpdate = $newControllerName;
        }

        $controllerId = $this->ControllersRepository->getModel()->where('nom', $controllerToUpdate)->value('id');
        $updatedData = ['nom' => $controllerToUpdate];

        $this->ControllersRepository->update($controllerId, $updatedData);

        $this->assertDatabaseHas('controllers', ['nom' => $updatedData['nom']]);
    }

    public function test_update_controller_not_exist()
    {
        $this->actingAs($this->user);
        $controller = AutorisationController::factory()->create();
        $data = ['nom' => 'UpdatedController'];

        $this->expectException(ControllerExceptions::class);

        $this->ControllersRepository->update($controller->id + 1, $data);
    }

    public function test_delete_controller()
    {
        $this->actingAs($this->user);
        $controller = AutorisationController::factory()->create();
        $this->ControllersRepository->destroy($controller->id);
        $this->assertDatabaseMissing('controllers', ['id' => $controller->id]);
    }
}
