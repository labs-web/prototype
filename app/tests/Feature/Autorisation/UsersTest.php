<?php

namespace Tests\Feature\Autorisation;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\UtilisateursRepository;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use DatabaseTransactions;

    protected $utilisateursRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->utilisateursRepository = new UtilisateursRepository(new User);
    }

    public function test_create_user()
    {
        // Generate fake user data
        $userData = [
            'name' => 'ahmed',
            'lastname' => 'achaou', // Include lastname
            'email' => 'ahmedachoua@gmail.com',
            'password' => Hash::make('password123'),
            'password_confirmation' => Hash::make('password123'),
        ];
    
        // Assert password confirmation
        $this->assertEquals($userData['password'], $userData['password_confirmation']);
    
        // Remove password_confirmation from user data
        unset($userData['password_confirmation']);
    
        // Create the user
        $this->utilisateursRepository->create($userData);
    
        // Assert user creation result
        $this->assertDatabaseHas('users', $userData);
    }
    
}
