<?php

declare(strict_types=1);

namespace Core\Router;
use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            $pattern = $this->convertRouteToRegex($route['uri']);
            if (preg_match($pattern, $uri, $matches) && $route['method'] === strtoupper($method)) {
                array_shift($matches); // Remove the full match
                $matches = array_values($matches); // Re-index the array
                
                if (isset($route['middleware'])) {
                    $middleware = Middleware::MAP[$route['middleware']];
                    (new $middleware)->handle();
                }

                if (str_contains($route['controller'], '@')) {
                    [$controller, $action] = explode('@', $route['controller']);
                    $controllerClass = "App\\Http\\Controllers\\{$controller}";
                    
                    if (!class_exists($controllerClass)) {
                        throw new \Exception("Controller {$controllerClass} not found");
                    }

                    $controllerInstance = new $controllerClass();

                    if (!method_exists($controllerInstance, $action)) {
                        throw new \Exception("Method {$action} not found in controller {$controller}");
                    }

                    // Use call_user_func_array instead of unpacking
                    return call_user_func_array([$controllerInstance, $action], $matches);
                }

                // Check whether the user is a Guest or Authorized
                Middleware::resolve($route['middleware']);
                
                return require base_path("app/{$route['controller']}");
            }
        }

        $this->abort();
    }
    
    protected function abort($code = 404) {
        http_response_code($code);

        view("{$code}.php");

        die();
    }

    private function convertRouteToRegex($route)
    {
        $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<$1>[^/]+)', $route);
        return "#^" . $pattern . "$#";
    }

}
