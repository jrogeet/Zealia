<?php

use Core\Response;


function dd($values) {
    echo "<pre>";
    print_r($values);
    echo "</pre>";
}

function abort($code = 404) {
    http_response_code($code);

    view("{$code}.php");

    die();
}


function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);
    require base_path('app/views/' . $path);
}

function controller($path, $attributes = []) {
    extract($attributes);
    require base_path('app/controller/' . $path);
}

function router($path)
 {
    return base_path('app/router/'. $path);
 }

function redirect($path)
{
    header("location: {$path}");
    exit();
}


function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}



