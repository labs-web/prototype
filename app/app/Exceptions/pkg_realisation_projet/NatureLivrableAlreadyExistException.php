<?php

namespace App\Exceptions\pkg_realisation_projet;

use App\Exceptions\BusinessException;

class NatureLivrableAlreadyExistException extends BusinessException
{
    public static function create()
    {
        // Ensure this message key exists in your localization files
        return new self(__('pkg_realisation_projet/nature_livrable/message.createNatureLivrableException'));
    }
}

