<?php

namespace Tests\Feature\pkg_competences;

use App\Models\pkg_competences\NiveauCompetence;
use Tests\TestCase;
use App\Models\pkg_competences\Competence;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompetencesTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Competence();
    }

    public function test_paginate_competences(): void
    {
        $competences = $this->model->paginate(2);
        $this->assertNotNull($competences);
        $this->assertNotEmpty($competences);
    }

    public function test_create_competences(): void
    {
        $niveauCompetence = NiveauCompetence::first();

        $data = [
            'nom' => "TestNomCompetences",
            'description' => "TestDescriptionCompetences",
            'niveau_competences_id' => $niveauCompetence->id
        ];

        $this->model->create($data);
        $this->assertDatabaseHas('competences', [
            'nom' => $data['nom'],
            'description' => $data['description']
        ]);
    }

    public function test_update_competences(): void
    {
        $niveauCompetence = NiveauCompetence::first();

        $existingCompetences = $this->model->create([
            'nom' => 'ExistingNomCompetences',
            'description' => "ExistingDescriptionCompetences",
            'niveau_competences_id' => $niveauCompetence->id
        ]);

        $newName = 'UpdatedNomCompetences';
        $newDescription = 'UpdatedDescriptionCompetences';
        $newNiveauCompetencesId = $niveauCompetence->id; 

        $existingCompetences->update([
            'nom' => $newName,
            'description' => $newDescription,
            'niveau_competences_id' => $newNiveauCompetencesId
        ]);

        $this->assertEquals($newName, $existingCompetences->nom);
        $this->assertEquals($newDescription, $existingCompetences->description);
        $this->assertEquals($newNiveauCompetencesId, $existingCompetences->niveau_competences_id);
        $this->assertDatabaseHas('competences', [
            'nom' => $newName,
            'description' => $newDescription,
            'niveau_competences_id' => $newNiveauCompetencesId
        ]);
    }

    public function test_delete_competences(): void
    {
        $niveauCompetence = NiveauCompetence::first();

        $existingCompetences = $this->model->create([
            'nom' => 'ExistingNomCompetences',
            'description' => 'ExistingDescriptionCompetences',
            'niveau_competences_id' => $niveauCompetence->id
        ]);

        $existingCompetences->delete();

        $this->assertDatabaseMissing('competences', [
            'id' => $existingCompetences->id
        ]);
    }
}
