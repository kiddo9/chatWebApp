<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof BroadcastException || str_contains($exception->getMessage(), 'pusher')) {
            Log::warning('Broadcast failed: ' . $exception->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Connection lost. Trying to reconnect...'
                ], 200);
            }

            return back()->with('error', 'Real-time features are temporarily unavailable.');
        }

        return parent::render($request, $exception);
    }
}
