<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$rows = $db->query('SELECT * FROM accounts', [])->findAll();

view("group/group-results.view.php", [
    'heading' => 'About',
    'notifications' => $notifications,
    'rows' => $rows
]);


