<?php

namespace App\Exceptions\GestionProjets;

use Exception;

class TaskException extends Exception
{
    public static function createTask()
    {
        return new self(__('GestionProjets/task/message.createTaskException'));
    }
}