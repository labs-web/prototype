<?php

namespace Tests\Feature\pkg_posts;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\pkg_posts\Post;
use Tests\TestCase;

/**
 * Classe de test pour tester les fonctionnalités du module de posts.
 */
class postsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_getAll_posts()
    {
        $post = Post::create([
            'nom' => 'test',
            'description' => 'description',
        ]);
        $posts = Post::paginate(4);
        $this->assertNotNull($posts);
    }

    /**
     * Teste la création d'un post.
     */
    public function test_create_post()
    {
        $postsData = [
            'nom' => 'post create test',
            'description' => 'post create test',
        ];
        $post = Post::create($postsData);
        $this->assertEquals($postsData['nom'], $post->nom);
    }

    // update posts
    public function test_update_posts()
    {
        $post = Post::create([
            'nom' => 'test',
            'description' => 'description',
        ]);

        $post->update([
            'nom' => 'updated test',
            'description' => 'updated description',
        ]);

        $updatedpost = Post::find($post->id);

        $this->assertEquals('updated test', $updatedpost->nom);
        $this->assertEquals('updated description', $updatedpost->description);
    }

    /**
     * Teste la suppression d'un post.
     */
    public function test_delete()
    {
        $post = Post::create([
            'nom' => 'test',
            'description' => 'description',
        ]);

        $post->delete();

        $this->assertDatabaseMissing('statut_taches', [
            'id' => $post->id,
        ]);
    }
}
