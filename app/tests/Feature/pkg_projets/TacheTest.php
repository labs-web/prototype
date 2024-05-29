<?php

namespace Tests\Feature\pkg_projets;

use App\Models\pkg_projets\Tache;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TacheTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_Tache(): void
    {
        $data =[
            'nom'=> "Création de Backend",
            'description'=> "Création de Partie Backend de Classe Tache",
            'priorité' => 1,
            'dateEchéance' => '2024/06/08',
            'apprenant_id' => 10,
            'personne_id' => 1,
            'projets_id' => 1,
            'status_tache_id' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        $add_data = Tache::create($data);
        $this->assertNotNull($add_data);
    }


    public function test_update_Tache(): void
    {
        $data =[
            'nom'=> "Création de Partie Backend",
            'description'=> "Création de Partie Backend de Classe Tache",
            'priorité' => 1,
            'dateEchéance' => '2024/06/08',
            'apprenant_id' => 10,
            'projets_id' => 1,
            'personne_id' => 1,
            'status_tache_id' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        $update_data = Tache::find(7)->update($data);
        $this->assertNotNull($update_data);
    }

    public function test_delete_Tache(): void
    {
        $update_data = Tache::destroy(6);
        $this->assertNotNull($update_data);
    }

    public function test_paginate_Tache(): void
    {
        $update_data = Tache::paginate(3);
        $this->assertNotNull($update_data);
    }
}
