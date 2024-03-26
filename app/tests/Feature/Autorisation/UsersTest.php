<?php

namespace Tests\Feature\Autorisation;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\UtilisateursRepository;
use App\Exceptions\Autorisation\UserAlreadyExistsException;
use App\Exceptions\Autorisation\UserDoesNotExist;


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
public function test_create_a_user_that_does_not_exist()
{
    // Generate fake user data
    $password = 'password123';
    $confiramtion_password = 'password123';

    $userData = [
        'prenom' => 'ahmed',
        'nom' => 'achaou', 
        'email' => 'ahmedachoua@gmail.com',
        'password' => $password,
    ];

    $this->assertEquals($confiramtion_password, $userData['password']);
    $userData['password'] = Hash::make($userData['password']);

    // Create the user
    $this->utilisateursRepository->create($userData);
    // Assert user creation result
    $this->assertDatabaseHas('users', ['email' => $userData['email']]);
}


// ===== TEST CREATE USER THAT EXIST

public function test_create_a_user_that_already_exists()
{
    // Generate fake user data
    $existingUser = [
        'prenom' => 'John',
        'nom' => 'Doe', 
        'email' => 'johndoe@example.com',
        'password' => Hash::make('existingPassword'),
    ];

    // Insert the existing user into the database
    User::create($existingUser);

    // Attempt to create a user with the same email
    $userData = [
        'prenom' => 'Jane',
        'nom' => 'Doe', 
        'email' => 'johndoe@example.com', // Already existing email
        'password' => Hash::make('newPassword'),
    ];

    try {
        $this->utilisateursRepository->create($userData);
        $this->fail('Expected UserAlreadyExistsException was not thrown');
    } catch (UserAlreadyExistsException $exception) {
        $this->assertEquals('Authorization/users/message.A User with this Email already exist', $exception->getMessage());
    }
}


// ======== TEST UPDATE FUNCTION ==============

public function test_update_user()
{
    $old_password = 'password123';
    $new_password = 'new_password123';
    $password_confirmation = 'new_password123';

    // Create a user that is going to be updated
    $user = User::create([ 
        'prenom' => 'hamid',
        'nom' => 'achaou', 
        'email' => 'johndoe@example.com',
        'password' => Hash::make('password123'), // Hash the password
    ]);

    // Generate updated data for the user
    $updatedData = [
        'prenom' => 'Adnan',
        'nom' => 'ben nassar', 
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

    $this->assertEquals($updatedData['prenom'], $updatedUser->prenom);
    $this->assertEquals($updatedData['email'], $updatedUser->email);
    $this->assertTrue(Hash::check($new_password, $updatedUser->password));
}


// ======== TEST UPDATE User that doesnot ==============

public function test_update_a_user_that_does_not_exist()
{
    // Generate data for updating the user
    $updatedData = [
        'prenom' => 'Adnano',
        'nom' => 'ben nassar', 
        'email' => 'AdnanBennasare12@example.com',
        'old_password' => 'old_password123',
        'password' => 'new_password123',
        'password_confirmation' => 'new_password123',
    ];

    // Attempt to update a non-existing user
    $nonExistingUserId = 9999; // Assuming this ID does not exist

    try {
        $this->utilisateursRepository->update($nonExistingUserId, $updatedData);
        $this->fail('Expected UserDoesNotExist was not thrown');
    } catch (UserDoesNotExist $exception) {
        $this->assertEquals("Authorization/users/message.The user you're trying to update doesn't exist", $exception->getMessage());
    }

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


// ============ GET ALL USERS ==============


public function test_get_users()
{
    // Create 5 users with names containing 'John'
    User::factory()->create(['prenom' => 'ahmed mohamed']);
    User::factory()->create(['prenom' => 'hamid']);

    // Call the getUsers method with the query 'John'
    $pagination = $this->utilisateursRepository->getUsers('ahmed');
    $this->assertCount(1, $pagination->items());

}

}