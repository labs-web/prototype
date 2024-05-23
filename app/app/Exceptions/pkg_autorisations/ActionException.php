<?php

namespace App\Exceptions\pkg_autorisations;

use Exception;

class ActionException extends Exception
{
    // Méthode pour récupérer un message personnalisé lorsqu'une action existe déjà
    public static function createActionExceptionMessage()
    {
        return __('pkg_autorisations/Action/message.createActionException');
    }

    // Méthode pour récupérer un message personnalisé lorsqu'une action est mise à jour
    public static function updateActionExceptionMessage()
    {
        return __('pkg_autorisations/Action/message.updateActionException');
    }

    // Méthode pour récupérer un message personnalisé lorsqu'une erreur inattendue se produit
    public static function unexpectedErrorMessage()
    {
        return __('pkg_autorisations/Action/message.unexpected_error');
    }
}
