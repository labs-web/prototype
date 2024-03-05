<?php

namespace Tests\Feature\projets;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Models\GestionProjets\Projet;
use League\CommonMark\Extension\DescriptionList\Node\Description;
use Tests\TestCase;

class projetTest extends TestCase
{
    use DatabaseTransactions;
    protected $projectRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->projectRepository = new ProjetRepository(new Projet);
        $this->user = User::factory()->create();
    }

    public function test_get_paginated_projects(){
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $project = $this->projectRepository->paginatedData();
        $this->assertNotEmpty($project);
    }
    public function test_create_project(){
        $this->actingAs($this->user);

        $projectData = [
            'nom' => 'cnmh',
            'description' => 'cnmh management',
            'date_debut' => '2023-10-10 16:22:14',
            'date_de_fin' => '2024-03-02 16:22:14',
        ];
        $project = $this->projectRepository->store($projectData);
        $this->assertDatabaseHas('projets' , $projectData);
    }
    public function test_update_data(){
        $this->actingAs($this->user);
        $Existingproject = Projet::factory()->create();
        $projectUpdate = [
            'nom' => 'portfolio',
            'description' => 'portfolio application',
            'date_debut' => '2023-10-10 16:22:14',
            'date_de_fin' => '2024-03-02 16:22:14',
        ];
        $this->projectRepository->update($Existingproject->id , $projectUpdate);
        $this->assertDatabaseHas('projets' , $projectUpdate);
    }
    public function test_delete_project(){
        $this->actingAs($this->user);
        $projectData = Projet::factory()->create();
        $this->projectRepository->destroy($projectData->id);
        $this->assertDatabaseMissing('projets' , ['id' => $projectData->id]);
    }
    public function test_project_search(){
        $this->actingAs($this->user);
        $projectData = [
            'nom' => 'portfolio',
            'description' => 'portfolio application',
            'date_debut' => '2023-10-10 16:22:14',
            'date_de_fin' => '2024-03-02 16:22:14',
        ];
        $createProject = $this->projectRepository->store($projectData);
        $searchValue = 'portfolio';
        $searchResults = $this->projectRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}
