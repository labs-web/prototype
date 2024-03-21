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




// ======== TEST CREATE FUNCTION ==============
public function test_create_user()
{
    // Generate fake user data
    $password = 'password123';
    $confiramtion_password = 'password123';

    $userData = [
        'name' => 'ahmed',
        'lastname' => 'achaou', 
        'email' => 'ahmedachoua@gmail.com',
        'password' => $password,
        'password_confirmation' => $confiramtion_password,
    ];

    $this->assertEquals($userData['password_confirmation'], $userData['password']);
    unset($userData['password_confirmation']);
    $userData['password'] = Hash::make($userData['password']);

    // Create the user
    $this->utilisateursRepository->create($userData);
    // Assert user creation result
    $this->assertDatabaseHas('users', ['email' => $userData['email']]);
}



// ======== TEST UPDATE FUNCTION ==============

public function test_update_user()
{
    $old_password = 'password123';
    $new_password = 'new_password123';
    $password_confirmation = 'new_password123';

    // Create a user that is going to be updated
    $user = User::create([ 
        'name' => 'hamid',
        'lastname' => 'achaou', 
        'email' => 'hamidachaou@example.com',
        'password' => Hash::make('password123'), // Hash the password
    ]);

    // Generate updated data for the user
    $updatedData = [
        'name' => 'Adnan',
        'lastname' => 'ben nassar', 
        'email' => 'AdnanBennasare@example.com',
        'old_password' => $old_password,
        'password' => $new_password,
        'password_confirmation' => $password_confirmation,
    ];

  
    $this->assertTrue(Hash::check($updatedData['old_password'], $user->password));

    $this->assertEquals($updatedData['password'], $updatedData['password_confirmation']);

    // Remove unused keys
    unset($updatedData['old_password']);
    unset($updatedData['password_confirmation']);

    // Hash the new password
    $updatedData['password'] = Hash::make($updatedData['password']);
    $result = $this->utilisateursRepository->update($user->id, $updatedData);
    $this->assertTrue($result);

    // Retrieve the updated user from the database
    $updatedUser = User::find($user->id);

    $this->assertEquals($updatedData['name'], $updatedUser->name);
    $this->assertEquals($updatedData['email'], $updatedUser->email);
    $this->assertTrue(Hash::check($new_password, $updatedUser->password));
}


// ============== Pagiante function =========


public function test_paginate_users()
{
    // Create 5 users
    User::factory()->count(4)->create();

    $pagination = $this->utilisateursRepository->paginate();
    $totalUsers = $pagination->count();
    $this->assertNotNull($pagination);
    $this->assertEquals(4, $totalUsers);
}

// ============== destroy function =========


public function test_destroy_user()
{
    // Create a fake user
    $user = User::factory()->create();

    // Delete the user
    $result = $this->utilisateursRepository->destroy($user->id);

    // Assert that the deletion was successful
    $this->assertTrue($result);

    // Check if the user still exists in the database
    $userExists = User::where('id', $user->id)->exists();

    // Assert that the user no longer exists in the database
    $this->assertFalse($userExists);
}

// ============= find function ============

public function test_find_user()
{
    // Create a fake user
    $user = User::factory()->create();

    // Find the user by ID
    $foundUser = $this->utilisateursRepository->find($user->id);

    // Assert that the found user matches the original user
    $this->assertEquals($user->id, $foundUser->id);
    $this->assertEquals($user->name, $foundUser->name);
    $this->assertEquals($user->email, $foundUser->email);
    // Add more assertions if there are additional fields to compare
}


// ============ get Users ==============



public function test_get_users()
{
    // Create 5 users with names containing 'John'
    User::factory()->create(['name' => 'ahmed mohamed']);
    User::factory()->create(['name' => 'hamid']);

    // Call the getUsers method with the query 'John'
    $pagination = $this->utilisateursRepository->getUsers('ahmed');
    $this->assertCount(1, $pagination->items());

}

}