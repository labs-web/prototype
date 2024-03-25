<?php

namespace App\Exceptions\GestionProjets;

use Exception;

class TaskExisteException extends Exception
{
    public static function createTask()
    {
        return new self(__('GestionProjets/task/message.createTaskException'));
    }
}