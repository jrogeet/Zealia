<?php 

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {  

    $allUserInfo = $db->query('select * from accounts where school_id = :id' , [
        'id'=>$_GET['id'],
    ])->find();

    $encoded_allUserInfo = json_encode($allUserInfo);

    view('admin/accounts/admin-account-edit.view.php', [
        'allUserInfo' => $allUserInfo,
        'encoded_allUserInfo' => $encoded_allUserInfo,
    ]);
} else {
    abort(403);
}