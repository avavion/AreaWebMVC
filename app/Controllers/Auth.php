<?php

namespace App\Controllers;

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

        $user = \R::dispense('users');

        $user->email = $email;
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->image_path = $image_path;

        \R::store($user);

        Router::redirect('/login');
    }
}
