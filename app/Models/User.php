<?php

namespace App\Models;

class User extends Database
{
    const IS_USER = 'user';
    const IS_ADMIN = 'admin';

    public static string $table = 'users';

    private static $instance;
    private static $dispense;

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

    public function create(array $data)
    {
        $user = self::getDispense();

        foreach ($data as $key => $value) {
            $user->$key = $value;
        }

        self::store(self::getDispense());
    }
}
