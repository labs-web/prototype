<?php

namespace Tests\Unit;

use App\Models\pkg_projets\StatutTache;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatutTacheTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_create()
    {
        $statutTache = StatutTache::create([
            'nom' => 'test',
            'description' => 'description',
        ]);
    
        $this->assertDatabaseHas('statut_taches', [
            'nom' => 'test',
            'description' => 'description',
        ]);
    }
    
    /** @test */
    public function test_show()
    {
        $statutTache = StatutTache::create([
            'nom' => 'test',
            'description' => 'description',
        ]);
    
        $foundStatutTache = StatutTache::find($statutTache->id);
    
        $this->assertNotNull($foundStatutTache);
    }
    
    /** @test */
    public function test_update()
    {
        $statutTache = StatutTache::create([
            'nom' => 'test',
            'description' => 'description',
        ]);
    
        $statutTache->update([
            'nom' => 'updated test',
            'description' => 'updated description',
        ]);
    
        $updatedStatutTache = StatutTache::find($statutTache->id);
    
        $this->assertEquals('updated test', $updatedStatutTache->nom);
        $this->assertEquals('updated description', $updatedStatutTache->description);
    }
    
    /** @test */
    public function test_delete()
    {
        $statutTache = StatutTache::create([
            'nom' => 'test',
            'description' => 'description',
        ]);
    
        $statutTache->delete();
    
        $this->assertDatabaseMissing('statut_taches', [
            'id' => $statutTache->id,
        ]);
    }

}