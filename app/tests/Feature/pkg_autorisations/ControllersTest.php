<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use App\Models\pkg_autorisations\Controller;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllersTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Controller;
    }

    /**
     * Test the pagination of controllers.
     */
    public function test_paginate_controllers(): void
    {
        $controllers = $this->model->paginate(2);
        $this->assertNotNull($controllers);
        $this->assertNotEmpty($controllers);
    }

    /**
     * Test the creation of a new controller.
     */
    public function test_create_controller(): void
    {
        $data = ['nom' => "TestController"];

        $this->model->create($data);
        $this->assertDatabaseHas('controllers', ['nom' => $data['nom']]);
    }


    /**
     * Test the update of an existing controller.
     */
    public function test_update_controller(): void
    {
        $existingController = $this->model->create(['nom' => 'ExistingController']);

        $newName = 'UpdatedController';
        $existingController->update(['nom' => $newName]);

        $this->assertEquals($newName, $existingController->nom);
        $this->assertDatabaseHas('controllers', ['nom' => $newName]);

    }


    /**
     * Test the deletion of an existing controller.
     */
    public function test_delete_controller(): void
    {
        $existingController = $this->model->create(['nom' => 'ExistingController']);

        $existingController->delete();

        $this->assertDatabaseMissing('controllers', ['id' => $existingController->id]);
    }


}
