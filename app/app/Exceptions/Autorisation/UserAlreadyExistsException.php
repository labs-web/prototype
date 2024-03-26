<?php

namespace App\Exceptions\Autorisation; 

use Exception;

class UserAlreadyExistsException extends Exception 
{
    public static function creatingUserThatAlreadyExists()
    {
        return new self(__('Authorization/users/message.A User with this Email already exist')); 
    }

}
