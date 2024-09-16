<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    
    $tickets = $db->query('SELECT * FROM ticket', [

    ])->findAll();

    view('admin/tickets/admin-tickets.view.php', [
        'tickets' => $tickets,
    ]);

} else {
    abort(403);
}