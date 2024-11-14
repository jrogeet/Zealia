<?php 

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

if ($_SESSION['user']['account_type'] === "admin") {    
    // Fetch only admin accounts
    $admins = $db->query("SELECT * FROM accounts WHERE account_type = 'admin'", [])->findAll();
    
    view('admin/admin-settings.view.php', [
        'admins' => $admins
    ]);
} else {
    abort(403);
}