<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActionTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Action;
    }

    /**
     * Test the pagination of actions.
     */
    public function test_paginate_actions(): void
    {
        // Create sample actions for pagination test
        $this->model->create(['nom' => 'Action1', 'controller_id' => 1]);
        $this->model->create(['nom' => 'Action2', 'controller_id' => 1]);
        $this->model->create(['nom' => 'Action3', 'controller_id' => 1]);

        $actions = $this->model->paginate(2);
        $this->assertNotNull($actions);
        $this->assertNotEmpty($actions);
    }

    /**
     * Test the creation of a new action.
     */
    public function test_create_action(): void
    {
        // Create a sample controller for the action
        $controller = Controller::create(['nom' => 'TestController']);
        $data = ['nom' => "TestAction", 'controller_id' => $controller->id];

        $this->model->create($data);
        $this->assertDatabaseHas('actions', ['nom' => $data['nom']]);
    }

    /**
     * Test the update of an existing action.
     */
    public function test_update_action(): void
    {
        // Create a sample controller and action for the update test
        $controller = Controller::create(['nom' => 'TestController']);
        $existingAction = $this->model->create(['nom' => 'ExistingAction', 'controller_id' => $controller->id]);

        $newName = 'UpdatedAction';
        $existingAction->update(['nom' => $newName]);

        $this->assertEquals($newName, $existingAction->nom);
        $this->assertDatabaseHas('actions', ['nom' => $newName]);
    }

    /**
     * Test the deletion of an existing action.
     */
    public function test_delete_action(): void
    {
        // Create a sample controller and action for the delete test
        $controller = Controller::create(['nom' => 'TestController']);
        $existingAction = $this->model->create(['nom' => 'ExistingAction', 'controller_id' => $controller->id]);

        $existingAction->delete();

        $this->assertDatabaseMissing('actions', ['id' => $existingAction->id]);
    }
}
