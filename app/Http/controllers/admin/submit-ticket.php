<?php 

use Core\Session;
use Model\Database;
use Model\App;

$db = App::resolve(Database::class);
$config = App::resolve('config');
// $db = App::container()->resolve('Model\Database');

if (isset($_SESSION['user']['school_id'])) {
    $currentUser = $_SESSION['user']['school_id'];
    
    view("admin/submit-ticket.view.php", [
    ]);
    
} else {
    view('admin/submit-ticket.view.php', [
    ]);
}





