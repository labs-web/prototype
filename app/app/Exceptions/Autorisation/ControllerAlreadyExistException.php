<?php

namespace App\Exceptions\Autorisation;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerAlreadyExistException extends Exception
{
    public function report(): void
    {
        // ...
    }

    public function render(Request $request)
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], 500);
    }
}
