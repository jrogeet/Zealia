<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['school_id'];



