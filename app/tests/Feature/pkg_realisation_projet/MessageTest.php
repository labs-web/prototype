<?php

namespace Tests\Feature\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\Message;
use Tests\TestCase;
use App\Models\pkg_projets\Projet;
use App\Models\pkg_projets\Tache;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MessageTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Message();
    }

    public function test_paginate_messages(): void
    {
        $messages = $this->model->paginate(2);
        $this->assertNotNull($messages);
        $this->assertNotEmpty($messages);
    }

    public function test_create_messages(): void
    {
        $projet = Projet::first();
        $tache = Tache::first();

        $data = [
            'titre' => "TestTitreMessage",
            'description' => "TestDescriptionMessage",
            'isLue' => true,
            'projet_id' => $projet->id,
            'tach_id' => $tache->id,
        ];

        $this->model->create($data);
        $this->assertDatabaseHas('messages', [
            'titre' => $data['titre'],
            'description' => $data['description'],
            'isLue' => $data['isLue'],
        ]);
    }

    public function test_update_messages(): void
    {
        $projet = Projet::first();
        $tache = Tache::first();

        $existingMessage = $this->model->create([
            'titre' => 'ExistingTitreMessage',
            'description' => "ExistingDescriptionmessage",
            'projet_id' => $projet->id,
            'tach_id' => $tache->id,
            'isLue' => true
        ]);

        $newTitre = 'UpdatedTitreMessage';
        $newDescription = 'UpdatedDescriptionMessage';
        $newProjetId = $projet->id;
        $newTachId = $tache->id;
        $newLue = false;

        $existingMessage->update([
            'titre' => $newTitre,
            'description' => $newDescription,
            'projet_id' => $newProjetId,
            'tach_id' => $newTachId,
            'isLue' => $newLue,
        ]);

        $this->assertEquals($newTitre, $existingMessage->titre);
        $this->assertEquals($newDescription, $existingMessage->description);
        $this->assertEquals($newProjetId, $existingMessage->projet_id);
        $this->assertEquals($newTachId, $existingMessage->tach_id);
        $this->assertEquals($newLue, $existingMessage->isLue);
        $this->assertDatabaseHas('messages', [
            'titre' => $newTitre,
            'description' => $newDescription,
            'projet_id' => $newProjetId,
            'tach_id' => $newTachId,
            'isLue' => $newLue,
        ]);
    }

    public function test_delete_messages(): void
    {
        $projet = Projet::first();
        $tache = Tache::first();

        $existingMessage = $this->model->create([
            'titre' => 'ExistingTitreMessage',
            'description' => 'ExistingDescriptionMessage',
            'projet_id' => $projet->id,
            'tach_id' => $tache->id,
            'isLue' => true
        ]);

        $existingMessage->delete();

        $this->assertDatabaseMissing('messages', [
            'id' => $existingMessage->id
        ]);
    }
}
