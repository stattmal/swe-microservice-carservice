<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof ModelNotFoundException) {
                return $this->json_response(
                    'not found',
                    JsonResponse::HTTP_NOT_FOUND,
                    __('api.entityNotFound')
                );
            } else if ($exception instanceof NotFoundHttpException) {
                return $this->json_response(
                    'not found',
                    JsonResponse::HTTP_NOT_FOUND,
                    __('api.routeNotFound')
                );
            } else if ($exception instanceof MethodNotAllowedHttpException) {
                return $this->json_response(
                    'not allowed',
                    JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    __('api.methodNotFound')
                );
            } else if ($exception instanceof FileNotFoundException) {
                return $this->json_response(
                    'not found',
                    JsonResponse::HTTP_NOT_FOUND,
                    __('api.fileNotFound')
                );
            } else if ($exception instanceof AuthorizationException) {
                return $this->json_response(
                    'forbidden',
                    JsonResponse::HTTP_FORBIDDEN,
                    __('api.notAllowedResource')
                );
            }
        }
        return parent::render($request, $exception);
    }

    private function json_response($status, $statusCode, $message)
    {
        return response()->json([
            'status' => $status,
            'status_code' => $statusCode,
            'message' => $message
        ], $statusCode);
    }
}
