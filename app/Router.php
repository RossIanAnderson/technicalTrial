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
            
            return $this->callMethod(...explode('@', $this->routes[$type][$uri]));
        }
        throw new Exception('No route defined for this URI.');
    }

    protected function callMethod($controller, $method){
        if(!method_exists($controller, $method)){
            throw new Exception("{$controller} cannot respond to {$method}.");
        }
        return (new $controller)->$method();
    }
}