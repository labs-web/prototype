<?php

namespace App\Exceptions\pkg_competences;

use App\Exceptions\BusinessException;

class TechnologieAlreadyExistException extends BusinessException
{
    public static function createTechnologie()
    {
        return new self(__('Technologie est déjà existant'));
    }
}