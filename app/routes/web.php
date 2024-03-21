<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $userData = [
    //     'name' => 'ProjectLeader',
    //     'email' => 'Leader@gmail.com',
    //     'password' => Hash::make('password')
    // ];
    
    // $registerController = new User();
    // $response = $registerController->create($userData);
    return redirect('/login');
});

Auth::routes();

