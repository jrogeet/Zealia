<?php

namespace Core\Middleware;

// Determines if a page is for [Auth]orized (Logged In user) or [GUEST]
class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
        // 'confirmed' => EmailConfirmed::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if(! $middleware) {
            throw new \Exception("No matching middleware found for key '{$key}.");
        }

        // Call Auth.php or Guest.php from the Middleware
        (new $middleware)->handle();
    }
}