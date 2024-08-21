<?php

use Model\Container;
use Model\Database;
use Model\App;

$container = new Container();

$container->bind('Model\Database', function() {
    $config = require_once base_path('app/model/config.php'); // Binding the Database: Hostname, Port, Database Name, charset
    return new Database($config['database']);
});

App::setContainer($container);
