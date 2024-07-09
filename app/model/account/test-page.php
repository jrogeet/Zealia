<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['school_id'];

if(isset($_POST['jsonData'])) {
    $jsonData = $_POST['jsonData'];
    $decodedData = json_decode($jsonData, true); // Set second argument to true to get associative array

    $db->query('update accounts set personality_type = :perso_type, type_percentage = :perso_perc where school_id = :school_id', [
        ':perso_type' => $decodedData['mbti'],
        ':perso_perc' => $jsonData,
        ':school_id' => $currentUserId
    ]);

    dd($jsonData);

    header('location: /account');
    exit();

} else {
    echo "No JSON data received.";
}
