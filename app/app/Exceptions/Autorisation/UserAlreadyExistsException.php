<?php

namespace App\Exceptions\Autorisation; 

use Exception;

class UserAlreadyExistsException extends Exception 
{
    public static function creatingUserThatAlreadyExists()
    {
        return new self(__('Authorization/users/message.creating_user_that_already_exists')); 
    }
}
