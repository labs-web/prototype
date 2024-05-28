<?php

namespace Tests\Feature\pkg_realisation_projet;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\pkg_realisation_projet\LivrableRepository;
use App\Models\pkg_realisation_projet\Livrable;
use Tests\TestCase;
use App\Exceptions\pkg_realisation_projet\LivrableAlreadyExistException;

class LivrableTest extends TestCase
{
    use DatabaseTransactions;

    protected $livrableRepository;
  


     /**
     * Le référentiel de livrable utilisé pour les tests.
     *
     * @var  livrableRepository
    */
    protected $LivrableRepository;

    /**
     * L'utilisateur utilisé pour les tests.
     *
     * @var User
    */
    protected $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->livrableRepository = new LivrableRepository(new Livrable);
        $this->user = User::factory()->create();
    }

    public function test_create()
    {
        $this->actingAs($this->user);
        $livrableData = [
            'titre' => 'Livrable Test',
            'lien' => 'http://example.com',
            'description' => 'Description for livrable test'
        ];
        $livrable = $this->livrableRepository->create($livrableData);
        $this->assertEquals($livrableData['titre'], $livrable->titre);
    }

    public function test_create_livrable_already_exist()
    {
        $this->actingAs($this->user);
        $livrableData = [
            'titre' => 'Unique Title',
            'lien' => 'http://unique.com',
            'description' => 'Unique description'
        ];
        $this->livrableRepository->create($livrableData);

        $this->expectException(LivrableAlreadyExistException::class);
        $this->livrableRepository->create($livrableData);
    }

    public function test_paginate()
    {
        $this->actingAs($this->user);
        for ($i = 0; $i < 10; $i++) {
            $this->livrableRepository->create([
                'titre' => "Livrable $i",
                'lien' => "http://example$i.com",
                'description' => "Description $i"
            ]);
        }
        $livrables = $this->livrableRepository->searchData('', 5);
        $this->assertCount(5, $livrables);
    }

    public function test_livrable_search()
    {
        $this->actingAs($this->user);
        $this->livrableRepository->create([
            'titre' => 'Searchable Livrable',
            'lien' => 'http://searchable.com',
            'description' => 'Easily findable'
        ]);
        $searchResults = $this->livrableRepository->searchData('Searchable');
        $this->assertTrue($searchResults->contains('titre', 'Searchable Livrable'));
    }
}