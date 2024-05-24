<?php

namespace App\Exceptions\pkg_autorisations;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerAlreadyExistException extends Exception
{
    public static function ControllerAlreadyExist()
    {
        return new self(__('Autorisation/controllers/message.nomControllerExistDeja'));
    }
    

}
