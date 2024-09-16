<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$grouped = json_encode($_POST['grouped']);

view("rooms/groups/groups-edit.view.php", [
    'grouped' => $grouped,
]);