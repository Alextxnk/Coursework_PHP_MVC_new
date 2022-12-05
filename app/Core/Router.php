<?php

namespace App\Core;

class Router
{
    // Routes associated with method & uri 
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    // Instantiate Router class, require routes, return Router instance
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    // Inject controller associated with GET method & uri
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    // Inject controller associated with POST method & uri
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        // Check if uri exists in the routes->METHOD 
        if (array_key_exists($uri, $this->routes[$requestType])) {

            // return associated controller->METHOD 
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
    }

    public function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        // Instantiale controller class 
        $cont = new $controller;
        // return method
        return $cont->$action();
    }
}
