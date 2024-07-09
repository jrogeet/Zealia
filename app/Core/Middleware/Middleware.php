<?php

namespace Core\Middleware;

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