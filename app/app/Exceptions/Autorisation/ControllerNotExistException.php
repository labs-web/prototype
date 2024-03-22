<?php

namespace App\Exceptions\Autorisation;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ControllerNotExistException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        // ...
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request)
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], 500);
    }
}
