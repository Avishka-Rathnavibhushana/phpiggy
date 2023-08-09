<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, array $controller)
    {
        $this->routes[] = [
            'path' => $this->normalizePath($path),
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,5}#', '/', $path);

        return $path;
    }

    public function dispatch(string $method, string $uri)
    {
        $path = $this->normalizePath($uri);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (!preg_match("#^{$route['path']}$#", $path) || $route['method'] !== $method) {
                // ^ - start of string (value start with the pattern)
                // $ - end of string (value end with the pattern)
                continue;
            }

            [$class, $function] = $route['controller'];

            $controllerInstance = new $class;

            $controllerInstance->$function(); // OR {$function}()
        }
    }
}
