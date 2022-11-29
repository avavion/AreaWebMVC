<?php

namespace App\Models;

class Database extends \R
{
    private static $instance;
    private static $dispense;
    public static string $table;

    public static function query()
    {
        if (self::$instance instanceof self) {
            return self::$instance;
        }

        return self::$instance = new self;
    }

    public static function getDispense()
    {
        return self::$dispense;
    }

    private function __construct()
    {
        self::$dispense = self::dispense(self::$table);
    }
}
