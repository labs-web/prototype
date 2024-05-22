<?php

namespace Tests\Feature\pkg_rh;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\pkg_rh\Personne;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersonneTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Personne;
    }

    public function test_paginate_personnes(): void
    {
        $personnes = $this->model->paginate(2);
        $this->assertNotNull($personnes);
        $this->assertNotEmpty($personnes);
    }

    public function test_create_personne(): void
    {
        $data = [
            'nom' => 'Doe',
            'prenom' => 'John',
            'type' => 'apprenant',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $this->model->create($data);
        $this->assertDatabaseHas('personnes', ['nom' => $data['nom']]);
    }

    public function test_update_personne(): void
    {
        $existingPersonne = $this->model->create([
            'nom' => 'Doe',
            'prenom' => 'John',
            'type' => 'apprenant',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $newName = 'Updated Doe';
        $existingPersonne->update(['nom' => $newName]);

        $this->assertEquals($newName, $existingPersonne->nom);
        $this->assertDatabaseHas('personnes', ['nom' => $newName]);
    }

    public function test_delete_personne(): void
    {
        $existingPersonne = $this->model->create([
            'nom' => 'Doe',
            'prenom' => 'John',
            'type' => 'apprenant',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $existingPersonne->delete();

        $this->assertDatabaseMissing('personnes', ['id' => $existingPersonne->id]);
    }
}
