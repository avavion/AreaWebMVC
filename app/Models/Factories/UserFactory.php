<?php

namespace App\Models\Factories;

use App\Models\User;

class UserFactory
{
    public static function createAdmin(array $data)
    {
        $data['role'] = 'admin';

        User::query()->create($data);
    }
}
