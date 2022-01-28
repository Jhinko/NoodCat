<?php

namespace Router;

use Router\Route;

class Router{

    public string $url;
    public array $routes = [];
        
    public function __construct(string $url)
    {
        $this->url = trim($url, '/');

        
    }

    public function get(string $path, string $action)
    {
        $this->routes["GET"][] = new Route($path, $action);
    }
    public function post(string $path, string $action)
    {
        $this->routes["POST"][] = new Route($path, $action);
    }
    public function put(string $path, string $action)
    {
        $this->routes["PUT"][] = new Route($path, $action);
    }

    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
           if ($route->matches($this->url)) {
               $route->execute();
           }
        }
    }
}