<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

require_once '../core/Application.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', 'products');

$app->run();