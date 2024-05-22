<?php

namespace Tests\Feature\pkg_realisation_projet;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\pkg_realisation_projet\Livrable;
use App\Models\pkg_realisation_projet\NatureLivrable;

class LivrableTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_Livrable()
    {
        $natureLivrable = NatureLivrable::factory()->create();

        $livrableData = [
            'titre' => 'Test Livrable',
            'lien' => 'http://example.com',
            'description' => 'Description du Livrable',
            'nature_livrable_id' => $natureLivrable->id,
        ];

        $livrable = Livrable::create($livrableData);

        $this->assertEquals($livrableData['titre'], $livrable->titre);
        $this->assertEquals($livrableData['lien'], $livrable->lien);
        $this->assertEquals($livrableData['description'], $livrable->description);
        $this->assertEquals($livrableData['nature_livrable_id'], $livrable->nature_livrable_id);
    }

    public function test_update_Livrable()
    {
        $natureLivrable = NatureLivrable::factory()->create();

        $livrable = Livrable::factory()->create();

        $livrableData = [
            'titre' => 'Updated Test Livrable',
            'lien' => 'http://updated-example.com',
            'description' => 'Updated Description du Livrable',
            'nature_livrable_id' => $natureLivrable->id,
        ];

        $livrable->update($livrableData);

        $this->assertEquals($livrableData['titre'], $livrable->titre);
        $this->assertEquals($livrableData['lien'], $livrable->lien);
        $this->assertEquals($livrableData['description'], $livrable->description);
        $this->assertEquals($livrableData['nature_livrable_id'], $livrable->nature_livrable_id);
    }

    public function test_delete_Livrable()
    {
        $livrable = Livrable::factory()->create();

        $livrable->delete();

        $this->assertDatabaseMissing('livrables', [
            'id' => $livrable->id,
        ]);
    }
}
