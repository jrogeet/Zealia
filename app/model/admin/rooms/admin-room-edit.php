<?php

use Core\Validator;

use Model\Database;
use Model\App;
use Model\Logger;

$db = App::resolve(Database::class);
$logger = new Logger($db);

$currentUserId = $_SESSION['user']['school_id'];



