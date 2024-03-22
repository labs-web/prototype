<?php

namespace Tests\Feature\Autorisation;

use App\Models\User;
use App\Models\Autorisation\Action;
use App\Repositories\Autorisation\GestionActionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ActionTest extends TestCase
{
    use DatabaseTransactions;

    protected $gestionActionsRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gestionActionsRepository = new GestionActionsRepository(new Action);
        $this->user = User::factory()->create();
    }

    public function test_Get_Actions()
    {
        $this->actingAs($this->user);
        $projectData = Action::factory()->create();
        $Actions = $this->gestionActionsRepository->paginate();
        $this->assertNotEmpty($Actions);

 
    }

    public function test_Create_Action()
    {
        $this->actingAs($this->user);
        $projectData = Action::factory()->create();
        $ActionData = [
            'nom' => 'add',
            'controller' => 'ActionController',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Action = $this->gestionActionsRepository->create($ActionData);
        $this->assertEquals($ActionData['nom'], $Action->name);

   
    }

    public function test_Update_Action()
    {
        $this->actingAs($this->user);
        $projectData = Action::factory()->create();
        $ActionData = [
            'nom' => 'add',
            'controller' => 'ActionController',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Actions = $this->gestionActionsRepository->create($ActionData);
        $ActionData = [
            'nom' => 'update',
            'controller' => 'ActionController',
        ];
        $this->gestionActionsRepository->update($Actions->id, $ActionData);
        $this->assertDatabaseHas('Actions', $ActionData);

    }

    public function test_Delete_Action()
    {
        $this->actingAs($this->user);
        $projectData = Action::factory()->create();
        $ActionData = [
            'nom' => 'add',
            'controller' => 'ActionController',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Actions = $this->gestionActionsRepository->create($ActionData);
        $this->gestionActionsRepository->destroy($Actions->id);
        $this->assertDatabaseMissing('Actions', ['id' => $Actions->id]);

  
    }

    public function test_Search_Action()
    {
        $this->actingAs($this->user);
        $projectData = Action::factory()->create();
        $ActionData = [
            'nom' => 'add',
            'controller' => 'ActionController',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Actions = $this->gestionActionsRepository->create($ActionData);
        $searchValue = 'add';
        $searchResults = $this->gestionActionsRepository->search($searchValue,$projectData->id);
        $this->assertTrue($searchResults->contains('nom', $searchValue));


    }

    public function test_filter_Action()
    {
        $this->actingAs($this->user);
        $projectData = Action::factory()->create();
        $ActionData = [
            'nom' => 'add',
            'controller' => 'ActionController',
            'started_at' => '2023-10-10',
            'updated_at' => '2024-03-02',
        ];
        $Actions = $this->gestionActionsRepository->create($ActionData);
        $filterResults = $this->gestionActionsRepository->filter();
        $this->assertNotEmpty($filterResults);
    }
    public function test_filter_by_controller()
{
    $this->actingAs($this->user);

    // Create two actions, one with the controller name 'ActionController' and another with a different name
    $action1 = Action::factory()->create(['controller' => 'ActionController']);
    $action2 = Action::factory()->create(['controller' => 'DifferentController']);

    // Call the filterByController method
    $filteredActions = $this->gestionActionsRepository->filterByController('ActionController');

    // Assert that the returned collection only contains the action with the controller name 'ActionController'
    $this->assertTrue($filteredActions->contains($action1));
    $this->assertFalse($filteredActions->contains($action2));
}

}
