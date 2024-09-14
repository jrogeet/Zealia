<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);
// $db = App::container()->resolve('Model\Database');

if (isset($_SESSION['user']['school_id'])) {
    $currentUser = $_SESSION['user']['school_id']; 
    
    view("home.view.php", [
    ]);
} else {
    function getUserIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // IP from shared internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // IP passed from a proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            // Default to REMOTE_ADDR
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    $userIp = getUserIpAddr();

    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // $ipifyUrl = 'https://api.ipify.org?format=json';
    //     $response = file_get_contents($ipifyUrl);
    //     $ipData = json_decode($response, true);
    //     $userIP = $ipData['ip'];
        
    //     $locationUrl = 'http://ip-api.com/json/'.$userIP;
    //     $locationResponse = file_get_contents($locationUrl);
    //     $locationData = json_decode($locationResponse, true);
        
    //     $userLocation = $locationData['city'] . ', ' . $locationData['country'];

    //     $sessionId = session_id();


    view("home.view.php", [
        "userIp"=> $userIp,
        "userAgent"=> $userAgent,
        // "loc" => $userLocation,
        // "ses"=> $sessionId,
    ]);
}

