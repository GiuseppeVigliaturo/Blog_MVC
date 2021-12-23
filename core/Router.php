<?php

class Router
{

    protected $conn;

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function loadRoutes(array $routes)
    {

        $this->routes = $routes;
    }

    public function getRoutes()
    {

        return $this->routes;
    }

    public function dispatch()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim($url, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        if ( array_key_exists($method, $this->routes) && array_key_exists($url, $this->routes[$method])) {
            return $this->route($this->routes[$method][$url]);
        } else {
            throw new Exception('Method not found');
        }
    }

    protected function route($uri)
    {
        try {

            $tokens = explode('@', $uri);
            $controller = $tokens[0];
            $method = $tokens[1];
            $class = new $controller($this->conn);

            if (method_exists($class, $method)) {

                $class->$method();
                return $class;
            } else {
                throw new Exception('Metodo ' . $method . ' non trovato nella class ' . $controller);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
