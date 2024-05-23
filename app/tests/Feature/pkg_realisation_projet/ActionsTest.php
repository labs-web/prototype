<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\pkg_autorisations\GestionActionsRepository;
use App\Models\pkg_autorisations\Action;
use App\Models\pkg_autorisations\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActionsRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $actionRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actionRepository = new GestionActionsRepository(new Action);
    }

    public function testFind()
    {
        $action = Action::factory()->create();

        $foundAction = $this->actionRepository->find($action->id);

        $this->assertInstanceOf(Action::class, $foundAction);
        $this->assertEquals($action->id, $foundAction->id);
    }

    public function testSearch()
    {
        Action::factory()->create(['nom' => 'Test Action']);
        Action::factory()->create(['nom' => 'Another Action']);

        $results = $this->actionRepository->search('Test');

        $this->assertCount(1, $results->items());  // Adjusted to check the items in the pagination
        $this->assertEquals('Test Action', $results->first()->nom);
    }

    public function testCreate()
    {
        $data = [
            'nom' => 'New Action',
            'controller_id' => Controller::factory()->create()->id
        ];

        $action = $this->actionRepository->create($data);

        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals('New Action', $action->nom);
    }

    public function testUpdate()
    {
        $action = Action::factory()->create(['nom' => 'Old Name']);

        $updated = $this->actionRepository->update($action->id, ['nom' => 'New Name']);

        $this->assertTrue($updated);
        $this->assertEquals('New Name', $action->fresh()->nom);
    }

    public function testFilter()
    {
        $controller = Controller::factory()->create();

        $controllers = $this->actionRepository->filter();

        $this->assertTrue($controllers->contains($controller->id));  // Adjusted to check if collection contains the controller ID
    }
}
