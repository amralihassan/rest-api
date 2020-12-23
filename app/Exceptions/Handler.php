<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        // dd($e);
        if ($request->is('api*')) {
            // handle validation errors
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return response([
                    'status' => 'error',
                    'error' => $e->errors(),
                ], 422);
            }

            // authorization
            if ($e instanceof \Illuminate\Auth\Access\AuthorizationException) {
                return response([
                    'status' => 'error',
                    'error' => $e->getMessage(),
                ], 403);
            }

            // model not found or invalid url
            if (
                $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ||
                $e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
            ) {
                return response([
                    'status' => 'error',
                    'error' => 'Resources not found',
                ], 403);
            }

            // invalid route
            if ($e instanceof \Symfony\Component\Routing\Exception\RouteNotFoundException) {
                return response([
                    'status' => 'error',
                    'error' => $e->getMessage(),
                ], 403);
            }

            // invalid token
            if ($e instanceof \Illuminate\Auth\Access\AuthorizationException) {
                return response([
                    'status' => 'error',
                    'error' => $e->getMessage(),
                ], 401);
            }
            // Rale limit API
            if ($e instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
                return response([
                    'status' => 'error',
                    'error' => $e->getMessage(),
                ], 429);
            }
        }

        parent::render($request, $e);
    }
}
