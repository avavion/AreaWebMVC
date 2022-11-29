<?php

header('Content-Type: text/html;charset=utf8');

use App\Services\App;

require_once __DIR__ . '/vendor/autoload.php';

App::start();

require_once __DIR__ . '/router/routes.php';
