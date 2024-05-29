<?php

namespace App\Exceptions\pkg_competences;

use App\Exceptions\BusinessException;
use Exception;

class notificationException extends BusinessException
{
    public static function AlreadyExistNotification()
    {
        return new self('La Categorie Technlogie existe déjà');
    }

    public static function NotExistNotification()
    {
        return new self("La catégorie Technologie n'existe pas");
    }
}
