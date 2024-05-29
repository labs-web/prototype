<?php

namespace Tests\Feature\pkg_competences;

use App\Models\pkg_competences\Competence;
use Tests\TestCase;
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
        $data = [
            'nom' => 'TestNomCompetences',
            'description' => 'TestDescriptionCompetences',
        ];

        $this->model->create($data);

        $this->assertDatabaseHas('competences', [
            'nom' => $data['nom'],
            'description' => $data['description'],
        ]);
    }

    public function test_update_competences(): void
    {
        $existingCompetences = $this->model->create([
            'nom' => 'ExistingNomCompetences',
            'description' => 'ExistingDescriptionCompetences',
        ]);

        $newName = 'UpdatedNomCompetences';
        $newDescription = 'UpdatedDescriptionCompetences';

        $existingCompetences->update([
            'nom' => $newName,
            'description' => $newDescription,
        ]);

        $this->assertEquals($newName, $existingCompetences->nom);
        $this->assertEquals($newDescription, $existingCompetences->description);
        $this->assertDatabaseHas('competences', [
            'nom' => $newName,
            'description' => $newDescription,
        ]);
    }

    public function test_delete_competences(): void
    {
        $existingCompetences = $this->model->create([
            'nom' => 'ExistingNomCompetences',
            'description' => 'ExistingDescriptionCompetences',
        ]);

        $existingCompetences->delete();

        $this->assertDatabaseMissing('competences', [
            'id' => $existingCompetences->id,
        ]);
    }
}
