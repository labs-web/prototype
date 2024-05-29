<?php

namespace Tests\Feature\GestionProjets;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\pkg_rh\ApprenantRepositorie;
use App\Repositories\pkg_rh\FormateurRepositorie;
use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_rh\Formateur;
use App\Exceptions\pkg_rh\ApprenantAlreadyExistException;
use App\Exceptions\pkg_rh\FormateurAlreadyExistException;

use Tests\TestCase;
use App\Exceptions\GestionProjets\ProjectAlreadyExistException;

/**
 * Classe de test pour tester les fonctionnalités du module de projets.
*/
class PersonneTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Le référentiel de projets utilisé pour les tests.
     *
     * @var ProjetRepository
    */
    protected $FormateurRepository;
    protected $ApprenantRepository;


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
        $this->ApprenantRepository = new ApprenantRepositorie(new Apprenant);
        $this->FormateurRepository = new FormateurRepositorie(new Formateur);
        $this->user = User::factory()->create();
    }

    /**
     * Teste la pagination des projets.
    */
    public function test_paginate()
    {
        $this->actingAs($this->user);
        $formateurData = [
            'nom' => 'test1',
            'prenom' => 'test1',
            'groupe_id' => 1,
        ];
        $ApprenantData = [
            'nom' => 'test2',
            'prenom' => 'test2',
            'groupe_id' => 1,
        ];

        $formateur = $this->FormateurRepository->create($formateurData);
        $apprenant = $this->ApprenantRepository->create($ApprenantData);

        $formateurs = $this->FormateurRepository->paginate();
        $apprenants = $this->ApprenantRepository->paginate();

        $this->assertNotNull($formateurs);
        $this->assertNotNull($apprenants);

    }


    /**
     * Teste la création d'un projet.
    */
    public function test_create()
    {
        $this->actingAs($this->user);
        $formateurData = [
            'nom' => 'test1',
            'prenom' => 'test1',
            'groupe_id' => 1,
        ];

        $ApprenantData = [
            'nom' => 'test2',
            'prenom' => 'test2',
            'groupe_id' => 1,
        ];

        $formateur = $this->FormateurRepository->create($formateurData);
        $apprenant = $this->ApprenantRepository->create($ApprenantData);
        $this->assertEquals($formateur['nom'], $formateur->nom);
        $this->assertEquals($apprenant['nom'], $apprenant->nom);

    }

    /**
     * Teste la création d'un projet déjà existant.
    */
    public function test_create_personne_already_exist()
    {
        $this->actingAs($this->user);

        $formateurData = [
            'nom' => 'test1',
            'prenom' => 'test1',
            'groupe_id' => 1,
        ];
      
        try {
            $this->FormateurRepository->create($formateurData);
            $this->FormateurRepository->create($formateurData);
            $this->fail('Expected PersonneException was not thrown');
        }catch (FormateurAlreadyExistException $e) {
            $this->assertEquals('Formateur est deja existe', $e->getMessage());
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    /**
     * Teste la mise à jour d'un projet.
    */
    public function test_update()
    {
        $this->actingAs($this->user);
        $formateurData = [
            'nom' => 'test1',
            'prenom' => 'test1',
            'groupe_id' => 1,
        ];
        $ApprenantData = [
            'nom' => 'test2',
            'prenom' => 'test2',
            'groupe_id' => 1,
        ];

        $formateur = $this->FormateurRepository->create($formateurData);
        $apprenant = $this->ApprenantRepository->create($ApprenantData);
 
        $formateurDataUpdate = [
            'nom' => 'test3',
            'prenom' => 'test3',
        ];
        $ApprenantDataUpdate = [
            'nom' => 'test4',
            'prenom' => 'test4',
        ];


        $this->FormateurRepository->update($formateur->id, $formateurDataUpdate);
        $this->ApprenantRepository->update($apprenant->id, $ApprenantDataUpdate);

        $this->assertDatabaseHas('personnes', $formateurDataUpdate);
        $this->assertDatabaseHas('personnes', $ApprenantDataUpdate);

    }

    /**
     * Teste la suppression d'un projet.
    */
    public function test_delete_personne()
    {
        $this->actingAs($this->user);
        $formateurData = [
            'nom' => 'test1',
            'prenom' => 'test1',
            'groupe_id' => 1,
        ];
        $ApprenantData = [
            'nom' => 'test2',
            'prenom' => 'test2',
            'groupe_id' => 1,
        ];

        $formateur = $this->FormateurRepository->create($formateurData);
        $apprenant = $this->ApprenantRepository->create($ApprenantData);

        $this->ApprenantRepository->destroy($apprenant->id);
        $this->FormateurRepository->destroy($formateur->id);

        $this->assertDatabaseMissing('personnes', ['id' => $formateur->id]);
        $this->assertDatabaseMissing('personnes', ['id' => $apprenant->id]);

    }

    /**
     * Teste la recherche de projets.
    */
    public function test_project_search()
    {
        $this->actingAs($this->user);
        $formateurData = [
            'nom' => 'test',
            'prenom' => 'test',
            'groupe_id' => 1,
        ];
       
        $formateur = $this->FormateurRepository->create($formateurData);
        $searchValue = 'test';
        $searchResults = $this->FormateurRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}