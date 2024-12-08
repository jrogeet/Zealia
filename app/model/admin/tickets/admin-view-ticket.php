<?php

use Core\Validator;

use Model\Database;
use Model\App;
use Model\Logger;

$db = App::resolve(Database::class);
$logger = new Logger($db);

$currentUserId = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    
    $id = $_POST['ticket_id'];
    
    if (isset($_POST['add_response'])) {
        $response = $_POST['response'];
        
        $db->query('update ticket set admin_response = :response where ticket_id = :id', [
            'response' => $response,
            'id' => $id
        ]);

        $logger->log(
            'ADMIN: ADD TICKET RESPONSE',
            'success',
            'ticket',
            $id,
            [
                'ticket_id' => $id,
                'response' => $response
            ]
        );

        header("location: /admin-view-ticket?id={$id}&response_added=1");
        exit();
    }
    
    if (isset($_POST['solved'])) {
        $db->query('update ticket set status = "solved" where ticket_id = :id', [
            'id' => $id,
        ]);

        $logger->log(
            'ADMIN: SOLVE TICKET',
            'success',
            'ticket',
            $id,
            [
                'ticket_id' => $id,
            ]
        );

    } elseif (isset($_POST['unresolved'])) {
        $db->query('update ticket set status = "unresolved" where ticket_id = :id', [
            'id' => $id,
        ]);

        $logger->log(
            'ADMIN: UNSOLVE TICKET',
            'success',
            'ticket',
            $id,
            [
                'ticket_id' => $id,
            ]
        );
    } elseif (isset($_POST['pending'])) {
        $db->query('update ticket set status = "pending" where ticket_id = :id', [
            'id' => $id,
        ]);

        $logger->log(
            'ADMIN: PENDING TICKET',
            'success',
            'ticket',
            $id,
            [
                'ticket_id' => $id,
            ]
        );
    }

    header("location: /admin-view-ticket?id={$id}");
    exit();
} else {
    abort(403);
}

