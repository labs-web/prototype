<?php

namespace App\Exceptions;

class RoleException extends \Exception
{

    public static function createRole()
    {
        return new self(__('Autorisation/roles/message.createRoleException'));
    }
}

