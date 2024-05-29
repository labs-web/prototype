<?php
use Tests\TestCase;
use App\Models\pkg_projets\Equipe;
use Illuminate\Foundation\Testing\RefreshDatabase;


class EquipeTest extends TestCase
{
        use RefreshDatabase;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Equipe;
    }

    public function test_paginate_equipes(): void
    {
        // Seed the database with test data
        $equipes = $this->model->paginate(2);
        $this->assertNotNull($equipes);
        $this->assertNotEmpty($equipes);
    }

    public function test_create_equipe(): void
    {
        $data = [
            'nom' => 'Equipe 1',
            'description' => 'Description for Equipe 1',
            'projet_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $this->model->create($data);
        $this->assertDatabaseHas('equipes', ['nom' => $data['nom']]);
    }

    public function test_update_equipe(): void
    {
        $existingEquipe = $this->model->create([
            'nom' => 'Equipe 1',
            'description' => 'Description for Equipe 1',
            'projet_id' => 1, // Ensure this projet_id exists in the projets table
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $newName = 'Updated Equipe Name';
        $existingEquipe->update(['nom' => $newName]);

        $this->assertEquals($newName, $existingEquipe->nom);
        $this->assertDatabaseHas('equipes', ['nom' => $newName]);
    }

    public function test_delete_equipe(): void
    {
        $existingEquipe = $this->model->create([
            'nom' => 'Equipe 1',
            'description' => 'Description for Equipe 1',
            'projet_id' => 1, // Ensure this projet_id exists in the projets table
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $existingEquipe->delete();

        $this->assertDatabaseMissing('equipes', ['id' => $existingEquipe->id]);
    }
}