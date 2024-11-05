<?php
// Public Functions

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
    return base_path('app/Core/router/'. $path);
 }

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '') 
{
    return Core\Session::get('old')[$key] ?? $default;
}


function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function verifyRecaptcha($recaptchaResponse) {
    // $secretKey = "YOUR_SECRET_KEY";

    $config = \Model\App::resolve('config');
    $secretKey = $config['recaptcha']['secret_key'];
    $url = "https://www.google.com/recaptcha/api/siteverify";
    
    $data = array(
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    );
    
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response, true);
    
    return $responseKeys["success"];
}

