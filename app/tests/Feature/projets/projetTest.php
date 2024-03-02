<?php

namespace Tests\Feature\projets;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\projets\ProjetRepository;
use App\Models\projets\Projet;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
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

}
