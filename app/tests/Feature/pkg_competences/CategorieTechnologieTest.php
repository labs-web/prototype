<?php

namespace Tests\Feature\pkg_competences;

use App\Models\pkg_competences\CategorieTechnologie;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategorieTechnologieTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_CategorieTechnologie(): void
    {
        $data =[
            'nom'=> "Développement API",
            'description'=> "Création et maintenance d'Interfaces de Programmation d'Applications, qui permettent à différents systèmes logiciels de communiquer entre eux. Les API RESTful et GraphQL sont des approches courantes.",
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        $add_data = CategorieTechnologie::create($data);
        $this->assertNotNull($add_data);
    }


    public function test_update_CategorieTechnologie(): void
    {
        $data =[
            'nom'=> "Développement d'API",
            'description'=> "Création et maintenance d'Interfaces de Programmation d'Applications, qui permettent à différents systèmes logiciels de communiquer entre eux. Les API RESTful et GraphQL sont des approches courantes.",
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        $update_data = CategorieTechnologie::find(7)->update($data);
        $this->assertNotNull($update_data);
    }

    public function test_delete_CategorieTechnologie(): void
    {
        $update_data = CategorieTechnologie::destroy(6);
        $this->assertNotNull($update_data);
    }

    public function test_paginate_CategorieTechnologie(): void
    {
        $update_data = CategorieTechnologie::paginate(3);
        $this->assertNotNull($update_data);
    }
}
