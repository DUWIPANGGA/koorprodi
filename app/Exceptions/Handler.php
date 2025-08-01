<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        // 
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Resource not found'], 404);
            }
            return response()->view('errors.404', [], 404);
        });

        $this->renderable(function (AccessDeniedHttpException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden'], 403);
            }
            return response()->view('errors.403', [], 403);
        });

        $this->renderable(function (AuthenticationException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            return response()->view('errors.401', [], 401);
        });

        $this->renderable(function (Throwable $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Server Error'], 500);
            }
            return response()->view('errors.500', [], 500);
        });

        $this->renderable(function (MaintenanceModeException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Service Unavailable',
                    'retry' => $e->retryAfter
                ], 503);
            }
            return response()->view('errors.503', [
                'retry' => $e->retryAfter
            ], 503);
        });
    }
}