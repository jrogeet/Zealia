<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

if (isset($_POST['create'])) {

} elseif (isset($_POST['search'])) {
    
}