<?php

namespace Tests\Feature\pkg_posts;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\pkg_posts\Tag;
use Tests\TestCase;

/**
 * Classe de test pour tester les fonctionnalités du module de tags.
 */
class tagsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_getAll_tag()
    {
        $tag = Tag::create([
            'nom' => 'test',
            'description' => 'description',
        ]);
        $tags = Tag::paginate(4);
        $this->assertNotNull($tags);
    }

    /**
     * Teste la création d'un tag.
     */
    public function test_create_tag()
    {
        $postsData = [
            'nom' => 'post create test',
            'description' => 'post create test',
        ];
        $post = Tag::create($postsData);
        $this->assertEquals($postsData['nom'], $post->nom);
    }

    // update posts
    public function test_update_tag()
    {
        $post = Tag::create([
            'nom' => 'test',
            'description' => 'description',
        ]);

        $post->update([
            'nom' => 'updated test',
            'description' => 'updated description',
        ]);

        $updatedpost = Tag::find($post->id);

        $this->assertEquals('updated test', $updatedpost->nom);
        $this->assertEquals('updated description', $updatedpost->description);
    }

    /**
     * Teste la suppression d'un tag.
     */
    public function test_delete_tag()
    {
        $post = Tag::create([
            'nom' => 'test',
            'description' => 'description',
        ]);

        $post->delete();

        $this->assertDatabaseMissing('statut_taches', [
            'id' => $post->id,
        ]);
    }
}
