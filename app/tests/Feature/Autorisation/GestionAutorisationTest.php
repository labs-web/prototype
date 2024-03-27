<?php

namespace Tests\Feature\Autorisation;

use Tests\TestCase;
use App\Models\Autorisation\Autorisation;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\GestionAutorisationRepository;



class GestionAutorisationTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use DatabaseTransactions;

    protected $utilisateursRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->utilisateursRepository = new GestionAutorisationRepository(new Autorisation);
    }




}