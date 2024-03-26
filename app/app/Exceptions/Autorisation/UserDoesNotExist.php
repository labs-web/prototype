<?php

namespace App\Exceptions\Autorisation; 

use Exception;

class UserDoesNotExist extends Exception 
{
    public static function UpdateUserThatDoesNotExist()
    {
        return new self(__("Authorization/users/message.The user you're trying to update doesn't exist")); 
    }
}
