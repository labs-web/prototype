<?php

namespace Tests\Feature\pkg_realisation_projet;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\pkg_realisation_projet\NatureLivrable;

/**
 * Classe de test pour tester les fonctionnalités du module de NatureLivrables.
 */
class NatureLivrableTest extends TestCase
{
    use DatabaseTransactions;

    public function test_getAll_NatureLivrable()
    {
        $NatureLivrable = NatureLivrable::create([
            'nom' => 'test',
            'description' => 'description',
        ]);
        $NatureLivrables = NatureLivrable::paginate(4);
        $this->assertNotNull($NatureLivrables);
    }

    /**
     * Teste la création d'un NatureLivrable.
     */
    public function test_create_NatureLivrable()
    {
        $postsData = [
            'nom' => 'post create test',
            'description' => 'post create test',
        ];
        $post = NatureLivrable::create($postsData);
        $this->assertEquals($postsData['nom'], $post->nom);
    }

    // update posts
    public function test_update_NatureLivrable()
    {
        $post = NatureLivrable::create([
            'nom' => 'test',
            'description' => 'description',
        ]);

        $post->update([
            'nom' => 'updated test',
            'description' => 'updated description',
        ]);

        $updatedpost = NatureLivrable::find($post->id);

        $this->assertEquals('updated test', $updatedpost->nom);
        $this->assertEquals('updated description', $updatedpost->description);
    }

    /**
     * Teste la suppression d'un NatureLivrable.
     */
    public function test_delete_NatureLivrable()
    {
        $post = NatureLivrable::create([
            'nom' => 'test',
            'description' => 'description',
        ]);

        $post->delete();

        $this->assertDatabaseMissing('statut_taches', [
            'id' => $post->id,
        ]);
    }
}