<?php
namespace Tests\Feature\pkg_competences;

use App\Models\pkg_competences\NiveauCompetence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NiveauCompetenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_niveau_competence(): void
    {
        $niveauCompetence = NiveauCompetence::create(['nom' => 'TestNiveau', 'description' => 'TestDescription']);

        $this->assertDatabaseHas('niveau_competences', ['id' => $niveauCompetence->id]);
    }

    public function test_read_niveau_competence(): void
    {
        $niveauCompetence = NiveauCompetence::create(['nom' => 'TestNiveau', 'description' => 'TestDescription']);

        $foundNiveauCompetence = NiveauCompetence::find($niveauCompetence->id);

        $this->assertNotNull($foundNiveauCompetence);
        $this->assertEquals($niveauCompetence->id, $foundNiveauCompetence->id);
    }

    public function test_update_niveau_competence(): void
    {
        $niveauCompetence = NiveauCompetence::create(['nom' => 'TestNiveau', 'description' => 'TestDescription']);

        $niveauCompetence->update(['nom' => 'UpdatedNiveau' , 'description' => 'TestDescription']);

        $this->assertEquals('UpdatedNiveau', $niveauCompetence->fresh()->nom);
    }

    public function test_delete_niveau_competence(): void
    {
        $niveauCompetence = NiveauCompetence::create(['nom' => 'TestNiveau', 'description' => 'TestDescription']);

        $niveauCompetence->delete();

        $this->assertDatabaseMissing('niveau_competences', ['id' => $niveauCompetence->id]);
    }
}