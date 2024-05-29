<?php

namespace App\Exceptions\pkg_competences;

use App\Exceptions\BusinessException;
use Exception;

class categorietechnologieException extends BusinessException
{
    public static function AlreadyExistCategorieTechnlogie()
    {
        return new self('La Categorie Technlogie existe déjà');
    }

    public static function NotExistCategorieTechnlogie()
    {
        return new self("La catégorie Technologie n'existe pas");
    }
    
}
