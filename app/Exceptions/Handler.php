<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof \App\Exceptions\Auth\AccountNotConfirmedException) {
            return response()->view('errors.auth.unconfirmed', [], 422);
        }

        if ($e instanceof \Illuminate\Session\TokenMismatchException) {
            if ($request->json()) {
                return response()->json([
                    'success' => false,
                    'error' => [
                        'type' => 'errors.session.tokenmistmatch',
                        'message' => 'The CSRF Token could not be verified.',
                    ],
                ]);
            } else {
                return response()->view('errors.session.tokenmistmatch', [], 400);
            }
        }

        return parent::render($request, $e);
    }
}
