<?php

namespace App\Exceptions\pkg_autorisations;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerNotExistException extends Exception
{
    public static function ControllerNotExist()
    {
        return new self(__('Autorisation/controllers/message.controllerExistPas'));
    }


}
