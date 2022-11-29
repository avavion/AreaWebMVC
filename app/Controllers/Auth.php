<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Router;
use App\Services\Storage;

require_once 'app/Utils/Utils.php';

class Auth
{
    public function register(array $request)
    {
        $image_path = Storage::getInstance()->save($request['files']['photo']);

        $username = $request['data']['username'];
        $password = $request['data']['password'];
        $email = $request['data']['email'];
        $re_password = $request['data']['re_password'];

        if ($password !== $re_password) {
            Router::error(500);
            die();
        }

        User::query()->create([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'username' => $username,
            'image_path' => $image_path
        ]);

        Router::redirect('/login');
    }
}
