<?php
namespace Tests\Feature\pkg_competences;

use App\Models\pkg_competences\Competence;
use App\Models\pkg_competences\NiveauCompetence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NiveauCompetenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_niveau_competence(): void
    {
        // Create competence data
        $competenceData = [
            [
                'nom' => 'unit test',
                'description' => 'unit test description'
            ],
            [
                'nom' => 'unit test',
                'description' => 'unit test description'
            ]
        ];
        // Create the competence
        $competences = [];
        foreach ($competenceData as $data) {
            $competence = Competence::create($data);
            $competences[] = $competence->id;
        }


        // Define NiveauCompetence data
        $niveauCompetenceData = [
            ['nom' => 'imiter', 'description' => 'imiter description'],
            ['nom' => 'adapter', 'description' => 'adapter description'],
        ];

        // Create NiveauCompetences and attach to Competence
        $niveauCompetences = [];
        foreach ($niveauCompetenceData as $data) {
            $niveauCompetence = NiveauCompetence::create($data);
            $niveauCompetences[] = $niveauCompetence->id;
            // $niveauCompetence->competences()->attach($niveauCompetences);
            $competence->niveau()->attach($niveauCompetences);
        }

        // Assertions
        foreach ($niveauCompetences as $niveauId) {
            $this->assertDatabaseHas('competences_niveau', ['niveau_competence_id' => $niveauId]);
        }
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

        $niveauCompetence->update(['nom' => 'UpdatedNiveau', 'description' => 'TestDescription']);

        $this->assertEquals('UpdatedNiveau', $niveauCompetence->fresh()->nom);
    }

    public function test_delete_niveau_competence(): void
    {
        $niveauCompetence = NiveauCompetence::create(['nom' => 'TestNiveau', 'description' => 'TestDescription']);

        $niveauCompetence->delete();

        $this->assertDatabaseMissing('niveau_competences', ['id' => $niveauCompetence->id]);
    }
}


