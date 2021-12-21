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
}
