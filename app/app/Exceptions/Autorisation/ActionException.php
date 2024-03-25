<?php

namespace App\Exceptions\Autorisation;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;  // Import for translations

class ActionException extends Exception
{
    public function render(Request $request)
    {
        $translatedMessage = Lang::get('exception.action_error'); 
        $message = $translatedMessage ? $translatedMessage : $this->getMessage();

        return response()->json([
            'message' => $message,
            
        ], Response::HTTP_CONFLICT);

    }
}
