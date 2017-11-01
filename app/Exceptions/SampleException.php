<?php

namespace App\Exceptions;

use Exception;

class SampleException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
     public function report()
     {
        //
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {

        return response()->json([
            'data' => 'You have got a Sample  Exception   '
        ], 500);

    }
}
