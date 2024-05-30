<?php

namespace App\Exceptions\pkg_competences;

use App\Exceptions\BusinessException;

class niveauxCompetencesAlreadyExistException extends BusinessException
{
    public static function createNiveauxCompetences()
    {
        return new self(__('Niveau competence already existe'));
    }
}