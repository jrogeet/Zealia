<?php

use Model\App;
use Model\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$checkToken = $db->query("SELECT * FROM accounts WHERE account_activation_hash = :act_token_hash", [
    ":act_token_hash" => $token_hash
])->find();

// var_dump($checkToken);

if (!$checkToken) {
    die("token not found");
}

$db->query("UPDATE accounts SET account_activation_hash = NULL WHERE school_id = :id", [
    ":id" => $checkToken["school_id"]
]);

view("session/registration/success-activation.view.php", [
    
]);


