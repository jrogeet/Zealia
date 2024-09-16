<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$id = $db;

if (isset($_POST['edit'])) {

} elseif (isset($_POST['activate'])) {

} elseif (isset($_POST['delete'])) {
    
}