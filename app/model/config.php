<?php

return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'zealia',
        'charset' => 'utf8mb4'
    ],
    // ,

    // 'services' => [
    //     'prerender' => [
    //         'token' =>'',
    //         'secret' => ''
    //     ]
    // ]

    'socket' => [
        'server_url' => 'http://zealia.local:80', // Development
        // 'server_url' => 'https://socket.yoursite.com', // Production
        'client_url' => 'http://zealia.local:80', // Development
        // 'client_url' => 'https://socket.yoursite.com', // Production
    ]
];