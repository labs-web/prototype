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
        $password = 'password123';
        $userData = [
            'name' => 'ahmed',
            'lastname' => 'achaou', // Include lastname
            'email' => 'ahmedachoua@gmail.com',
            'password' => $password,
            'password_confirmation' => $password,
        ];
    
        // Hash the password for comparison
        $hashedPassword = Hash::make($password);
    
        // Assert password confirmation
        $this->assertTrue(Hash::check($userData['password'], $hashedPassword));
    
        // Remove password_confirmation from user data
        unset($userData['password_confirmation']);
    
        // Create the user
        $this->utilisateursRepository->create($userData);
    
        // Assert user creation result
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }
    
    
    
}
