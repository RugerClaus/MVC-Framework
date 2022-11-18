<?php

namespace app\core;

require_once 'core/Application.php';

$app = new Application();

$app->get('/',  function() {
    return 'fuckoff world';
});