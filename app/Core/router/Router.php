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
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if (isset($route['middleware'])) {
                    $middleware = Middleware::MAP[$route['middleware']];
                    (new $middleware)->handle();
                }

                // If controller contains @, handle it as Controller@method
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

                    return $controllerInstance->$action();
                } elseif ($route['controller'] === 'ApiController') {
                    // Handle API routes
                    $controllerClass = "App\\Http\\Controllers\\ApiController";
                    $controllerInstance = new $controllerClass();
                    $handlerMethod = 'handle' . ucfirst(strtolower($method));
                    
                    if (!method_exists($controllerInstance, $handlerMethod)) {
                        throw new \Exception("Method {$handlerMethod} not found in ApiController");
                    }
                    
                    return $controllerInstance->$handlerMethod($route['api_action'], $_REQUEST);
                } else {
                    // Handle file-based controllers
                    Middleware::resolve($route['middleware']);
                    
                    $controllerPath = base_path("app/{$route['controller']}");
                    if (!file_exists($controllerPath)) {
                        throw new \Exception("Controller file {$controllerPath} not found");
                    }
                    
                    return require $controllerPath;
                }
            }
        }

        $this->abort();
    }

    // Add a new method to handle API routes
    public function api($method, $uri, $action)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => 'ApiController',
            'method' => strtoupper($method),
            'middleware' => null,
            'api_action' => $action
        ];

        return $this;
    }
    
    protected function abort($code = 404) {
        http_response_code($code);

        view("{$code}.php");

        die();
    }

}