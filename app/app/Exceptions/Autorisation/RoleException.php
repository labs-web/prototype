<?php

namespace App\Exceptions\Autorisation;

use Exception;

class RoleException extends Exception
{
    public static function createRole()
    {
        return new self(__('Autorisation/roles/message.createRoleException'));
    }

    public static function updateRoleifNameNotExiste()
    {
        return new self(__('Autorisation/roles/message.updateRoleifNameNotExiste'));
    }
}
