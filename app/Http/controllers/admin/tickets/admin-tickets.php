<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    
    $tickets = $db->query('SELECT * FROM ticket', [
    ])->findAll();

    $pending = $db->query('SELECT * FROM ticket WHERE status = "pending"', [
    ])->findAll();

    $solved = $db->query('SELECT * FROM ticket WHERE status = "solved"', [
    ])->findAll();

    $unresolved = $db->query('SELECT * FROM ticket WHERE status = "unresolved"', [
    ])->findAll();

    view('admin/tickets/admin-tickets.view.php', [
        'tickets' => $tickets,
        'pending' => $pending,
        'solved' => $solved,
        'unresolved' => $unresolved,
    ]);

} else {
    abort(403);
}