<?php
namespace App\Support;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Route {

    private static $app;

    public static function init($app){
        self::$app = $app;
    }


    public static function get(string $route, string $function)
    {

        list($class, $method) = explode('@', $function);

        self::$app->get($route, function (Request $request, Response $response) use($class, $method){
            $controller = "App\Controller\\" . $class;
            $page = new $controller($method, $request, $response);
            return $page->response;
        });
    }

    public static function post(string $route, string $function)
    {
        list($class, $method) = explode('@', $function);

        self::$app->post($route, function (Request $request, Response $response) use($class, $method){
            $controller = "App\Controller\\" . $class;
            $page = new $controller($method, $request, $response);
            return $page->response;
        });
    }
}