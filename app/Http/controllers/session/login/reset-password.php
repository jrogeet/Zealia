<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);
// $db = App::container()->resolve('Model\Database');

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$account = $db->query("SELECT * FROM accounts
            WHERE reset_token_hash = :reset_hash", [
                ":reset_hash" => $token_hash,
            ])->find();


if (!$account) {
    die("Invalid or expired token");
}

if (strtotime($account["reset_token_expires_at"]) <= time()) {
    die("Token expired");
}

view('session/login/reset-password.view.php', [
    'token' => $token,
]);

