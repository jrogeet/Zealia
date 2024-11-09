<?php 

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    
    $rooms = $db->query("select * from rooms", [
        ])->findAll();
    
    $instructors = $db->query("select * from accounts where account_type = 'instructor'", [
        ])->findAll();
    
    foreach ($rooms as &$room) {
        foreach ($instructors as $instructor) {
            if($room['school_id'] === $instructor['school_id']) {
                $room['f_name'] = $instructor['f_name'];
                $room['l_name'] = $instructor['l_name'];
            }
        }
    } 
    
    view('admin/rooms/admin-rooms.view.php', [
        'rooms' => $rooms,
    ]);

} else {
    abort(403);
}