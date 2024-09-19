<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];


$groups_json = $_POST['grouped'];
$groups = json_decode($groups_json, true);

view("rooms/groups/groups-edit.view.php", [
    'groups' => $groups,
    'groups_json' => $groups_json
]);