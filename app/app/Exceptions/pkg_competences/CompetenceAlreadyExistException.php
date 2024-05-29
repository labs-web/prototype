<?php

namespace App\Exceptions\pkg_competences;

use App\Exceptions\BusinessException;

class CompetenceAlreadyExistException extends BusinessException
{
    public static function createCompetence()
    {
        return new self(__('Competence already existant'));
    }
}
