<?php

use Core\Session;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . '/vendor/autoload.php';

session_start();

require BASE_PATH . 'app/Core/functions.php';
require base_path("app/Core/bootstrap.php");


$router = new \Core\Router\Router();
$routes = require router('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();