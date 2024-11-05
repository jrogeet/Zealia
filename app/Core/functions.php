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
    // If we're offline and that's indicated in the response, bypass verification
    if ($recaptchaResponse === 'offline' && !hasInternetConnection()) {
        return true;
    }

    // If no response provided or invalid offline bypass, verification failed
    if (!$recaptchaResponse || $recaptchaResponse === 'offline') {
        return false;
    }

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
    
    try {
        $response = @file_get_contents($url, false, $context);
        
        if ($response === false) {
            // If we can't verify, only bypass if there's no internet
            return !hasInternetConnection();
        }
        
        $responseKeys = json_decode($response, true);
        return isset($responseKeys["success"]) ? $responseKeys["success"] : false;
    } catch (\Exception $e) {
        // If we can't verify, only bypass if there's no internet
        return !hasInternetConnection();
    }
}

function hasInternetConnection() {
    $connected = @fsockopen("www.google.com", 80, $errno, $errstr, 2);
    if ($connected) {
        fclose($connected);
        return true;
    }
    return false;
}

// function checkInternetConnection() {
//     $connected = @fsockopen("www.google.com", 80);
//     if ($connected) {
//         fclose($connected);
//         return true; // Internet is available
//     }
//     return false; // No internet connection
// }

// function verifyRecaptcha($recaptchaResponse) {
//     // $secretKey = "YOUR_SECRET_KEY";

//     if (!$recaptchaResponse) {
//         return true;
//     }

//     $config = \Model\App::resolve('config');
//     $secretKey = $config['recaptcha']['secret_key'];
//     $url = "https://www.google.com/recaptcha/api/siteverify";
    
//     $data = array(
//         'secret' => $secretKey,
//         'response' => $recaptchaResponse
//     );
    
//     $options = array(
//         'http' => array(
//             'header' => "Content-type: application/x-www-form-urlencoded\r\n",
//             'method' => 'POST',
//             'content' => http_build_query($data)
//         )
//     );
    
//     $context = stream_context_create($options);
    
//     try {
//         $response = @file_get_contents($url, false, $context);
        
//         // If request failed or no response
//         if ($response === false) {
//             return true; // Bypass verification if can't connect
//         }
        
//         $responseKeys = json_decode($response, true);
//         return $responseKeys["success"];
//     } catch (\Exception $e) {
//         return true; // Bypass verification if any error occurs
//     }
// }

