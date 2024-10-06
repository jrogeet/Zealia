<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);


$currentUser = $_SESSION['user']['school_id'];

view("account/test.view.php", [
    'currentUser' => $currentUser,
    'notifications' => $notifications
]);