<?php

namespace App\Exceptions\pkg_autorisations;

use App\Exceptions\BusinessException;

class ControllerExceptions extends BusinessException
{
    public static function ControllerNotExist()
    {
        return new self(__('pkg_autorisations/controller/message.controllerNotExistException'));
    }
    public static function ControllerAlreadyExist()
    {
        return new self(__('pkg_autorisations/controller/message.controllerAlreadyExist'));
    }
}