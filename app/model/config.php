<?php

return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'zealia',
        'charset' => 'utf8mb4'
    ],
     
    'recaptcha' => [
        'site_key' => $_ENV['RECAPTCHA_SITE_KEY'] ?? '',
        'secret_key' => $_ENV['RECAPTCHA_SECRET_KEY'] ?? ''
    ]

    // 'recaptcha' => [
    //     'site_key' => '6LeJznUqAAAAAElNeE8-AjZorT52-wlqoB9p-A4G',
    //     'secret_key' => '6LeJznUqAAAAACV56jvgKW-RPqr5yWh6PX3yfT48'
    // ]
    // ,

    // 'services' => [
    //     'prerender' => [
    //         'token' =>'',
    //         'secret' => ''
    //     ]
    // ]
];