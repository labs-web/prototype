<?php

namespace Tests\Feature\pkg_competences;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\pkg_competences\niveauxCompetencesRepository;
use App\Models\pkg_competences\NiveauCompetence;
use Tests\TestCase;
use App\Exceptions\pkg_competences\NiveauxCompetencesAlreadyExistException;

/**
 * Classe de test pour tester les fonctionnalités du module de niveauxCompetence.
 */
class NiveauxCompetenceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Le référentiel de niveauxCompetence utilisé pour les tests.
     *
     * @var niveauxCompetencesRepository
     */
    protected $niveauxCompetencesRepository;

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
        $this->niveauxCompetencesRepository = new niveauxCompetencesRepository(new NiveauCompetence());
        $this->user = User::factory()->create();
    }

    /**
     * Teste la pagination des niveaux.
     */
    public function test_paginate()
    {
        $this->actingAs($this->user);
        $niveauxData = [
            'nom' => 'niveaux create test',
            'description' => 'niveaux create test',

        ];
        $niveauxCompetence = $this->niveauxCompetencesRepository->create($niveauxData);
        $niveauxCompetence = $this->niveauxCompetencesRepository->paginate();
        $this->assertNotNull($niveauxCompetence);
    }


    /**
     * Teste la création d'un niveau.
     */
    public function test_create()
    {
        $this->actingAs($this->user);
        $niveauxData = [
            'nom' => 'niveuax create test',
            'description' => 'niveuax create test',

        ];
        $niveaux = $this->niveauxCompetencesRepository->create($niveauxData);
        $this->assertEquals($niveauxData['nom'], $niveaux->nom);
    }

    /**
     * Teste la création d'un niveaux competence déjà existant.
     */
    public function test_create_niveaux_competence_already_exist()
    {
        $this->actingAs($this->user);

        $niveauxData = [
            'nom' => 'niveaux create test',
            'description' => 'niveaux create test',

        ];
        $niveaux = $this->niveauxCompetencesRepository->create($niveauxData);
    
        try {
            $niveaux = $this->niveauxCompetencesRepository->create($niveauxData);
            $this->fail('Expected NiveauxCompetenceException was not thrown');
        } catch (NiveauxCompetencesAlreadyExistException $e) {
            $this->assertEquals(('Niveau competence already existe'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }

    /**
     * Teste la mise à jour d'un niveaux.
     */
    public function test_update_niveaux_competence()
    {
        $this->actingAs($this->user);
        $niveauxData = [
            'nom' => 'niveaux create test',
            'description' => 'niveaux create test',
            
        ];
        $niveaux = $this->niveauxCompetencesRepository->create($niveauxData);
        $niveauxUpdate = [
            'nom' => 'niveaux update test1',
            'description' => 'niveaux update test',

        ];
        $this->niveauxCompetencesRepository->update($niveaux->id, $niveauxUpdate);
        $this->assertDatabaseHas('niveau_competences', $niveauxUpdate);
    }

    /**
     * Teste la suppression d'un niveaux competence.
     */
    public function test_delete_niveaux_competence()
    {
        $this->actingAs($this->user);
        $niveauxData = [
            'nom' => 'niveaux create test',
            'description' => 'niveaux create test',
            
        ];
        $niveaux = $this->niveauxCompetencesRepository->create($niveauxData);
        $this->niveauxCompetencesRepository->destroy($niveaux->id);
        $this->assertDatabaseMissing('niveau_competences', ['id' => $niveaux->id]);
    }

    /**
     * Teste la recherche de niveauxCompetence.
     */
    public function test_niveaux_competence_search()
    {
        $this->actingAs($this->user);
        $niveauxData = [
            'nom' => 'tests',
            'description' => 'search niveaux test',

        ];
        $this->niveauxCompetencesRepository->create($niveauxData);
        $searchValue = 'tests';
        $searchResults = $this->niveauxCompetencesRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}