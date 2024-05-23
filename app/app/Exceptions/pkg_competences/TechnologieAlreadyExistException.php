<?php

namespace App\Exceptions\pkg_competences;

use App\Exceptions\BusinessException;

class TechnologieAlreadyExistException extends BusinessException
{
    public static function createTechnologie()
    {
        return new self(__('pkg_competences/technologie/message.createTechnologieException'));
    }
}