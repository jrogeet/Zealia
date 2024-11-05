<?php

require_once BASE_PATH . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Model\Container;
use Model\Database;
use Model\App;

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$container = new Container();

$config = require_once base_path('app/model/config.php');

$container->bind('config', function() use ($config) {
    return $config;
});

$container->bind('Model\Database', function() use ($config) {  // Add 'use ($config)'
    return new Database($config['database']);
});

// $container->bind('Model\Database', function() {
//     $config = require_once base_path('app/model/config.php'); // Binding the Database: Hostname, Port, Database Name, charset
//     return new Database($config['database']);
// });

// $container->bind('config', function() use ($config) {
//     return $config;
// });

App::setContainer($container);
