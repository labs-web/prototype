<?php

namespace Tests\Feature\pkg_realisation_projet;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\pkg_realisation_projet\NatureLivrableRepository;
use App\Models\pkg_realisation_projet\NatureLivrable;
use Tests\TestCase;
use App\Exceptions\pkg_realisation_projet\NatureLivrableAlreadyExistException;

/**
 * Classe de test pour tester les fonctionnalités du module de NatureLivrable.
 */
class NatureLivrableTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Le référentiel de NatureLivrable utilisé pour les tests.
     *
     * @var NatureLivrableRepository
     */
    protected $natureLivrableRepository;

    /**
     * L'utilisateur utilisé pour les tests.
     *
     * @var User
     */
    protected $user;

    /**
     * Met en place les préconditions pour chaque test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->natureLivrableRepository = new NatureLivrableRepository(new NatureLivrable);
        $this->user = User::factory()->create();
    }

    /**
     * Teste la pagination des NatureLivrables.
     */
    public function test_paginate()
    {
        $this->actingAs($this->user);
        $natureLivrableData = [
            'nom' => 'NatureLivrable create test',
            'description' => 'NatureLivrable create test',
        ];
        $natureLivrable = $this->natureLivrableRepository->create($natureLivrableData);
        $natureLivrables = $this->natureLivrableRepository->paginate();
        $this->assertNotNull($natureLivrables);
    }

    /**
     * Teste la création d'un NatureLivrable.
     */
    public function test_create()
    {
        $this->actingAs($this->user);
        $natureLivrableData = [
            'nom' => 'NatureLivrable create test',
            'description' => 'NatureLivrable create test',
        ];
        $natureLivrable = $this->natureLivrableRepository->create($natureLivrableData);
        $this->assertEquals($natureLivrableData['nom'], $natureLivrable->nom);
    }



    

    /**
     * Teste la création d'un NatureLivrable déjà existant.
     */
    public function test_create_nature_livrable_already_exist()
    {
        $this->actingAs($this->user);

        $natureLivrable = NatureLivrable::factory()->create();
        $natureLivrableData = [
            'nom' => $natureLivrable->nom,
            'description' => 'NatureLivrable create test',
        ];

        try {
            $natureLivrable = $this->natureLivrableRepository->create($natureLivrableData);
            $this->fail('Expected NatureLivrableAlreadyExistException was not thrown');
        } catch (NatureLivrableAlreadyExistException $e) {
            $this->assertEquals(__('pkg_realisation_projet/nature_livrable/message.createNatureLivrableException'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }

    /**
     * Teste la mise à jour d'un NatureLivrable.
     */
    public function test_update()
    {
        $this->actingAs($this->user);
        $natureLivrable = NatureLivrable::factory()->create();
        $natureLivrableData = [
            'nom' => 'NatureLivrable update test',
            'description' => 'NatureLivrable update test',
        ];
        $this->natureLivrableRepository->update($natureLivrable->id, $natureLivrableData);
        $this->assertDatabaseHas('nature_livrables', $natureLivrableData);
    }

    /**
     * Teste la suppression d'un NatureLivrable.
     */
    public function test_delete_nature_livrable()
    {
        $this->actingAs($this->user);
        $natureLivrable = NatureLivrable::factory()->create();
        $this->natureLivrableRepository->destroy($natureLivrable->id);
        $this->assertDatabaseMissing('nature_livrables', ['id' => $natureLivrable->id]);
    }

    /**
     * Teste la recherche de NatureLivrables.
     */
    public function test_nature_livrable_search()
    {
        $this->actingAs($this->user);
        $natureLivrableData = [
            'nom' => 'tests',
            'description' => 'search nature livrable test',
        ];
        $this->natureLivrableRepository->create($natureLivrableData);
        $searchValue = 'tests';
        $searchResults = $this->natureLivrableRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }
}


