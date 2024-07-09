<?php

use Model\Container;
use Model\Database;
use Model\App;

$container = new Container();

$container->bind('Model\Database', function() {
    $config = require_once base_path('app/model/config.php');
    return new Database($config['database']);
});

App::setContainer($container);
