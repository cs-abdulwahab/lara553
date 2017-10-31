<?php

namespace App\Exceptions;

use App\Http\Controllers\CustomException;
use Exception;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof CustomException &&
            $request->wantsJson()) {

         //   Log::emergency('THIS IS THE SAMPLE EXCEPTION METHOD');

            // Log::info('User failed to login.', ['id' => 2222]);

            return response()->json([
                'data' => 'You have got a query Exception   '
            ], 500);
        }


        // This will replace our 404 response with
        // a JSON response.
        if ($exception instanceof ModelNotFoundException &&
            $request->wantsJson()) {
            return response()->json([
                'data' => 'Resource not found'
            ], 404);
        }


        return parent::render($request, $exception);
    }
}
