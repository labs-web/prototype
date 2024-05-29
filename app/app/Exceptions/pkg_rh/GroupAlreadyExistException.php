<?php

namespace App\Exceptions\pkg_rh;

use App\Exceptions\BusinessException;

class GroupAlreadyExistException extends BusinessException
{
    public static function createGroup()
    {
        return new self(__('Group already existe'));
    }
}