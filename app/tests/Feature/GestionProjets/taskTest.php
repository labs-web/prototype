<?php

namespace Tests\Feature\projets;

use App\Models\User;
use App\Models\GestionProjets\Task;
use App\Models\GestionProjets\Projet;
use App\Repositories\GestionProjets\TaskRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    protected $taskRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = new TaskRepository(new Task);
        $this->user = User::factory()->create();
    }

    public function testGetPaginatedTasks()
    {
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $taskData = [
                    'nom' => 'test',
                    'description' => 'test',
                    'date_debut' => '2023-10-10',
                    'date_de_fin' => '2024-03-02',
                    'project_id' => $projectData->id
        ];
        $tasks = $this->taskRepository->store($taskData);
        $tasks = $this->taskRepository->paginatedData();
        $this->assertNotNull($tasks);
    }

    public function testCreateTask()
    {
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $taskData = [
            'nom' => 'test',
            'description' => 'test',
            'date_debut' => '2023-10-10',
            'date_de_fin' => '2024-03-02',
            'project_id' => $projectData->id
        ];
        $task = $this->taskRepository->store($taskData);
        $this->assertEquals($taskData['nom'], $task->nom);
    }

    public function testUpdateTask()
    {
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $taskData = [
            'nom' => 'test',
            'description' => 'test',
            'date_debut' => '2023-10-10',
            'date_de_fin' => '2024-03-02',
            'project_id' => $projectData->id
        ];
        $tasks = $this->taskRepository->store($taskData);
        $taskData = [
            'nom' => 'test',
            'description' => 'test',
        ];
        $this->taskRepository->update($tasks->id, $taskData);
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function testDeleteTask()
    {
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $taskData = [
            'nom' => 'test',
            'description' => 'test',
            'date_debut' => '2023-10-10',
            'date_de_fin' => '2024-03-02',
            'project_id' => $projectData->id
        ];
        $tasks = $this->taskRepository->store($taskData);
        $this->taskRepository->destroy($tasks->id);
        $this->assertDatabaseMissing('tasks', ['id' => $tasks->id]);
    }

    public function testTaskSearch()
    {
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $taskData = [
            'nom' => 'test',
            'description' => 'test',
            'date_debut' => '2023-10-10',
            'date_de_fin' => '2024-03-02',
            'project_id' => $projectData->id
        ];
        $tasks = $this->taskRepository->store($taskData);
        $searchValue = 'test';
        $searchResults = $this->taskRepository->searchData($searchValue,$projectData->id);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

    public function test_filter_task(){
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $taskData = [
            'nom' => 'test',
            'description' => 'test',
            'date_debut' => '2023-10-10',
            'date_de_fin' => '2024-03-02',
            'project_id' => $projectData->id
        ];
        $tasks = $this->taskRepository->store($taskData);
        $filterResults = $this->taskRepository->filter();
        $this->assertNotNull($filterResults);
    }
}
