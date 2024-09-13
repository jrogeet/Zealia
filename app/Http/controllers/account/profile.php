<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$school_id = $_GET['id'];



$stu_info[] = $db->query('select * from accounts where school_id = :stu_id', [
    ':stu_id'=> $school_id,
])->find();


view('account/profile.view.php', [
    'stu_info' => $stu_info,
    'notifications' => $notifications
]);
