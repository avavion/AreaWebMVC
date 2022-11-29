<?php

use App\Controllers\Auth;
use App\Services\Router;

Router::page('/login', 'login');
Router::page('/register', 'register');

Router::post('/auth/register', Auth::class, 'register', true, true);

Router::enable();
