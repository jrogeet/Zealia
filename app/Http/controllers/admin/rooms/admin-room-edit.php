<?php 

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {
    $room_id =  $_GET['room_id']; 

    $allRoomInfo = $db->query('select * from rooms where room_id = :id' , [
        'id'=> $room_id,
    ])->find();

    $roomStudents = $db->query('select * from room_list where room_id = :id' , [
        'id'=> $room_id,
    ])->findAll();

    foreach($roomStudents as &$student) {
        $stu_info = $db->query('select * from accounts where school_id = :id', [
            ':id' => $student['school_id']
        ])->find();
        
        $student['f_name'] = $stu_info['f_name'];
        $student['l_name'] = $stu_info['l_name'];
        $student['school_id'] = $stu_info['school_id'];
        $student['email'] = $stu_info['email'];
    }

    $roomGroups = $db->query('select * from room_groups where room_id = :id' , [
        'id'=> $room_id,
    ])->find();

    $decoded_roomGroups = json_decode($roomGroups['groups_json'], true);

    $encoded_allRoomInfo = json_encode($allRoomInfo);
    $encoded_roomStudents = json_encode($roomStudents);

    view('admin/rooms/admin-room-edit.view.php', [
        'allRoomInfo' => $allRoomInfo,
        'roomStudents' => $roomStudents,
        'roomGroups' => $roomGroups,
        'decoded_roomGroups' => $decoded_roomGroups,
        'encoded_allRoomInfo' => $encoded_allRoomInfo,
        'encoded_roomStudents' => $encoded_roomStudents, 
    ]);
} else {
    abort(403);
}