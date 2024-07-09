<?php 


use Model\App;
use Model\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];
$uri = $_POST['uri'];

$db->query('DELETE FROM notifications WHERE receiver_id = :user_id', [
    ':user_id' => $currentUser
]);


header("Location: {$uri}");
exit;

