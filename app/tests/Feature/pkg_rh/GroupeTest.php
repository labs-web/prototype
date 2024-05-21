<?php

namespace Tests\Feature\pkg_rh;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\pkg_rh\Groupe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GroupeTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Groupe;
    }

    public function test_paginate_groupes(): void
    {
        $groupes = $this->model->paginate(2);
        $this->assertNotNull($groupes);
        $this->assertNotEmpty($groupes);
    }

    public function test_create_groupe(): void
    {
        $data = [
            'nom' => 'Groupe 1',
            'description' => 'Description for Groupe 1',
        ];

        $this->model->create($data);
        $this->assertDatabaseHas('groupes', ['nom' => $data['nom']]);
    }

    public function test_update_groupe(): void
    {
        $existingGroupe = $this->model->create([
            'nom' => 'Groupe 1',
            'description' => 'Description for Groupe 1',
        ]);

        $newName = 'Updated Groupe Name';
        $existingGroupe->update(['nom' => $newName]);

        $this->assertEquals($newName, $existingGroupe->nom);
        $this->assertDatabaseHas('groupes', ['nom' => $newName]);
    }

    public function test_delete_groupe(): void
    {
        $existingGroupe = $this->model->create([
            'nom' => 'Groupe 1',
            'description' => 'Description for Groupe 1',
        ]);

        $existingGroupe->delete();

        $this->assertDatabaseMissing('groupes', ['id' => $existingGroupe->id]);
    }
}
