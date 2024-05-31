<?php

namespace Tests\Feature\pkg_rh;

use App\Models\pkg_rh\Groupe;
use App\Models\pkg_rh\Formateur;
use App\Models\pkg_rh\Apprenant;
use App\Models\User;
use App\Repositories\pkg_rh\GroupRepositorie;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Exceptions\pkg_rh\GroupAlreadyExistException;
use App\Repositories\pkg_rh\ApprenantRepositorie;
use App\Repositories\pkg_rh\FormateurRepositorie;

class GroupesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * The repository instance used for the tests.
     *
     * @var GroupRepositorie
     */
    protected $groupRepository;
    protected $apprenantRepositorie;
    protected $formateurRepositorie;

    protected function setUp(): void
    {
        parent::setUp();
        $this->groupRepository = new GroupRepositorie();
        $this->apprenantRepositorie = new ApprenantRepositorie();
        $this->formateurRepositorie = new FormateurRepositorie();
    }

    public function testCreateGroup()
    {
        $groupData = [
            'nom' => 'New Group',
            'description' => 'Description of new group',
            
        ];

        $group = $this->groupRepository->create($groupData);

    

        $this->assertEquals($groupData['nom'], $group->nom);
        $this->assertDatabaseHas('groupes', ['nom' => 'New Group']);
        $this->assertDatabaseHas('personnes', [
            'groupe_id' => $group->id,
            'type' => 'formateur'
        ]);
        $this->assertDatabaseHas('personnes', [
            'groupe_id' => $group->id,
            'type' => 'apprenant'
        ]);
    }

//   public function testUpdateGroup()
//     {
//         // Fetch a user
//         $user = User::where('email', 'formateur@solicode.co')->firstOrFail();

//         $group = new Groupe();
//         $group->nom = 'Original Name';
//         $group->description = 'Original Description';
//         $group->save();

//         $formateur = new Formateur();
//         $formateur->nom = 'New Formateur';
//         $formateur->prenom = 'yasmien';
//         $formateur->groupe_id = $group->id;
//         $formateur->user_id = $user->id; // Set the user_id
//         $formateur->save();

//         $apprenant1 = new Apprenant();
//         $apprenant1->nom = 'New One';
//         $apprenant1->prenom = 'amina';
//         $apprenant1->groupe_id = $group->id;
//         $apprenant1->user_id = $user->id; // Set the user_id
//         $apprenant1->save();

       

//         $updateData = [
//             'nom' => 'Updated Group nom',
//             'description' => 'Updated description',
          
//         ];

//         $updatedGroup = $this->groupRepository->update($group->id, $updateData);

//         if (!$updatedGroup) {
//             $this->fail('Failed to update the group');
//         }

//         $this->assertSame('Updated Group Name', $updatedGroup->nom);
//         $this->assertDatabaseHas('groupes', ['nom' => 'Updated Group Name']);
//     }



    public function testCreateGroupAlreadyExists()
    {
        $existingGroup = new Groupe();
        $existingGroup->nom = 'Existing Group';
        $existingGroup->description = 'Existing description';
        $existingGroup->save();

        $this->expectException(GroupAlreadyExistException::class);

        $groupData = [
            'nom' => $existingGroup->nom,
            'description' => 'Another description'
        ];

        $this->groupRepository->create($groupData);
    }

 


    public function testSearchGroup()
    {
        $group = new Groupe();
        $group->nom = 'Searchable Group';
        $group->description = 'Description of searchable group';
        $group->save();

        $searchResults = $this->groupRepository->searchData(['Searchable']);

        $this->assertTrue($searchResults->contains('nom', 'Searchable Group'));
    }

    public function testPaginateGroups()
    {
        for ($i = 0; $i < 15; $i++) {
            $group = new Groupe();
            $group->nom = "Group $i";
            $group->description = "Description of group $i";
            $group->save();
        }

        $paginatedResults = $this->groupRepository->paginate();

        $this->assertCount(15, $paginatedResults);
    }
}

