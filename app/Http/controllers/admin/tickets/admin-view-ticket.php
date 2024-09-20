<?php 

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    

    $ticket = $db->query('SELECT * FROM ticket WHERE ticket_id = :id', [
        'id' => $_GET['id'],
    ])->find();

    view('admin/tickets/admin-view-ticket.view.php', [
        'ticket' => $ticket,
    ]);
}

