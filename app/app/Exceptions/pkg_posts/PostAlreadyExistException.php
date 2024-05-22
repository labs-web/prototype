<?php

namespace App\Exceptions\GestionProjets;

use App\Exceptions\BusinessException;

class PostAlreadyExistException extends BusinessException
{
    public static function createProject()
    {
        return new self(__('posts already existe'));
    }
}