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

    $typeNperc = $db->query('select R, I, A, S, E, C, result from accounts where school_id = :school_id', [
        ':school_id' => $currentUser,
    ])->find();

    $jsonData = $typeNperc['type_percentage'];
    $decodedData = json_decode($jsonData, true);

    // dd($typeNperc);
    // var_dump($decodedData);

    view("account/account.view.php", [
        'decodedData' => $decodedData,
    ]);
    
} else if (is_null($hasTypeAlr['result'])) {
    view("account/account.view.php", [
    ]);
}