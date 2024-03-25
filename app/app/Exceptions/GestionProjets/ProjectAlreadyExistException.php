<?php

namespace App\Exceptions\GestionProjets;

use Exception;

class ProjectAlreadyExistException extends Exception
{
    public static function createProject()
    {
        return new self(__('GestionProjets/projet/message.createProjectException'));
    }
}