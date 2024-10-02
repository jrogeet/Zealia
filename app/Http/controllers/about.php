<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);
// $db = App::container()->resolve('Model\Database');

if (isset($_SESSION['user']['school_id'])) {
    $currentUser = $_SESSION['user']['school_id'];
    
    view("about.view.php", [
    ]);
} else {
    view("about.view.php", [
    ]);
}
