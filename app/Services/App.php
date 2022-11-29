<?php

namespace App\Services;

class App
{
    public static function start()
    {
        self::libs();
        self::database();
    }

    public static function libs()
    {
        $config = require_once "config/app.php";

        foreach ($config['libs'] as $lib) {
            require_once 'libs/' . $lib . '.php';
        }
    }

    public static function database()
    {
        $config = require_once "config/database.php";

        if ($config['enable']) {
            \R::setup(
                'mysql:host=' . $config['host'] . ':' . $config['port'] . ';dbname=' . $config['db_name'],
                $config['user'],
                $config['password']
            );

            if (!\R::testConnection()) {
                die('Error Database Connect');
            }
        }
    }
}
