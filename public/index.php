<?php
session_start();

use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'app/Core/functions.php';
// require base_path("vendor/autoload.php");

// require base_path('app/model/Database.php');
// require base_path('Response.php');

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("app/{$class}.php");
});

// require base_path('app/router/router.php');

require base_path("app/Core/bootstrap.php");

$router = new \Router\Router();

$routes = require router('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();