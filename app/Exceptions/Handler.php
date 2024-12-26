<?php

namespace App\Exceptions;

use Hybridly\Concerns\HandlesHybridExceptions;
use Hybridly\Contracts\HybridResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    use HandlesHybridExceptions;

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {

    }

    /**
     * Returns a hybrid page that renders the exception.
     */
    protected function renderHybridResponse(Response $response, Request $request, \Throwable $e): HybridResponse
    {
        return hybridly('error', [
            'status' => $response->getStatusCode(),
        ]);
    }
}
