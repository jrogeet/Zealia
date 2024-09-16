<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$hasTypeAlr = $db->query('select result from accounts where school_id = :school_id', [
    ':school_id' => $currentUser,
])->find();

if (! is_null($hasTypeAlr['result'])) {
    // var_dump($hasTypeAlr['personality_type']);

    $typeNscores = $db->query('select R, I, A, S, E, C, result from accounts where school_id = :school_id', [
        ':school_id' => $currentUser,
    ])->find();

    // $jsonData = $typeNscores['type_percentage'];
    // $decodedData = json_decode($jsonData, true);

    //dd($typeNscores);
     //var_dump($decodedData);

    view("account/account.view.php", [
        'typeNscores' => $typeNscores,
    ]);
    
} else if (is_null($hasTypeAlr['result'])) {
    view("account/account.view.php", [
    ]);
}