<?php

namespace Core\Classes;

class Router {
    protected array $routes = [];
    protected string $uri;
    protected string $method;

    public function __construct() {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
        $this->method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }

    public function match()
    {
        $matches = false;

        // d($this->method);

        foreach ($this->routes as $route) {
            if (($route['uri'] === $this->uri) and ($route['method'] === strtoupper($this->method))) {

                require_once CONTROLLERS . "/{$route['controller']}";
                $matches = true;
                break;
            }
        }

        return $matches;

    }

    public function add($uri, $controller, $method){
        $this->routes[] = [
            'uri'=> $uri,
            'controller'=> $controller,
            'method'=> $method
        ];
    }

    public function get($uri, $controller){
        $this->add($uri, $controller, 'GET');
    }
    public function post($uri, $controller){
        $this->add($uri, $controller, 'POST');
    }
    public function put($uri, $controller){
        $this->add($uri, $controller, 'PUT');
    }
    public function delete($uri, $controller){
        $this->add($uri, $controller, 'DELETE');
    }
}