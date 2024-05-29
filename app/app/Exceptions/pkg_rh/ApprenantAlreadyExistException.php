<?php

namespace App\Exceptions\pkg_rh;

use App\Exceptions\BusinessException;

class ApprenantAlreadyExistException extends BusinessException
{
    public static function createApprenant()
    {
        return new self(__('pkg_rh/personne.apprenantException'));
    }
}