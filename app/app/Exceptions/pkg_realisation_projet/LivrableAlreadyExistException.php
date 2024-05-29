<?php

namespace App\Exceptions\pkg_realisation_projet;

use Exception;

class LivrableAlreadyExistException extends Exception
{

    public static function createLivrable()
    {
        return new self('Livrable est déjà existant');
    }
   
}
