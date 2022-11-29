<?php

namespace App\Services;

class Router
{
    private static array $list = [];

    public static function getRoutes(): array
    {
        return self::$list;
    }

    // public static function get($uri, $controller, $method)
    // {
    //     self::$list[] = [
    //         'uri' => $uri,
    //         'controller' => $controller,
    //         'method' => $method
    //     ];
    // }

    public static function page($uri, $page_name): void
    {
        self::$list[] = [
            'uri' => $uri,
            'page' => $page_name
        ];
    }

    public static function post($uri, $controller, $method, $formdata = false, $files = false)
    {
        self::$list[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'post' => true,
            'formdata' => $formdata,
            'files' => $files
        ];
    }

    public static function enable(): void
    {
        $query = isset($_GET['q']) ? $_GET['q'] : '/';

        foreach (self::getRoutes() as $route) {
            if ($route['uri'] === '/' . $query) {
                if (isset($route['post']) === true && $_SERVER['REQUEST_METHOD'] === "POST") {
                    $request = [];

                    $instance = new $route['controller'];
                    $method = $route['method'];

                    if ($route['formdata']) {
                        $request['data'] = $_POST;
                    }

                    if ($route['files']) {
                        $request['files'] = $_FILES;
                    }

                    $instance->$method($request);
                } else {
                    require_once 'views/pages/' . $route['page'] . '.php';
                }

                die();
            }
        }

        self::error(404);
    }

    public static function error($code)
    {
        require_once 'views/errors/' . $code . '.php';
    }

    public static function redirect($uri)
    {
        header('Location: ' . $uri);
    }
}
