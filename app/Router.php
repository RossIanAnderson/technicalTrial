<?php

class Router {
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function get($uri, $controller){
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller){
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $type){
        if(array_key_exists($uri, $this->routes[$type])){
            return $this->routes[$type][$uri];
        }
        throw new Exception('No route defined for this URI.');
    }
}