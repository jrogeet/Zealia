<?php

use Core\Validator;
use Model\Database;
use Model\App;
use Model\Logger;

$db = App::resolve(Database::class);
$logger = new Logger($db);

if (!isset($_POST['room_id']) && !isset($_GET['room_id'])) {
    header("Location: /admin-rooms");
    exit();
}

$roomExists = $db->query('select count(*) as count from rooms where room_id = :id', [
    ':id' => $_GET['room_id'] ?? $_POST['room_id']
])->find();

if (!$roomExists || $roomExists['count'] == 0) {
    header("Location: /admin-rooms");
    exit();
}

$room_id = $_GET['room_id'] ?? $_POST['room_id'];
$room_name = $_POST['room_name'] ?? '';
$instructor_id = $_POST['instructor_id'] ?? '';
$room_code = $_POST['room_code'] ?? '';
$decoded_allRoomInfo = isset($_POST['encoded_allRoomInfo']) ? json_decode($_POST['encoded_allRoomInfo'], true) : null;

if (isset($_POST['edit'])) {
    if (!empty($room_name)) {
        $db->query('update rooms set room_name = :room_name where room_id = :id', [
            ':room_name' => $room_name,
            ':id' => $room_id,
        ]);

        $logger->log(
            'ADMIN: EDIT ROOM NAME',
            'success',
            'room',
            $room_id,
            [
                'room_id' => $room_id,
                'new_room_name' => $room_name,
                'old_room_name' => $decoded_allRoomInfo['room_name'],
            ]
        );
    }

    if (!empty($instructor_id)) {
        // Verify instructor exists
        $instructorExists = $db->query('select count(*) as count from accounts where school_id = :school_id', [
            ':school_id' => $instructor_id
        ])->find();

        if ($instructorExists['count'] == 0) {
            header("Location: /admin-room-edit?room_id={$room_id}&error=instructor_not_found");
            exit();
        }

        $db->query('update rooms set school_id = :instructor_id where room_id = :id', [
            ':instructor_id' => $instructor_id,
            ':id' => $room_id,
        ]);

        $logger->log(
            'ADMIN: EDIT ROOM INSTRUCTOR',
            'success',
            'room',
            $room_id,
            [
                'room_id' => $room_id,
                'new_instructor_id' => $instructor_id,
                'old_instructor_id' => $decoded_allRoomInfo['school_id'],
            ]
        );
    }

    if (!empty($room_code)) {
        $db->query('update rooms set room_code = :room_code where room_id = :id', [
            ':room_code' => $room_code,
            ':id' => $room_id,
        ]);

        $logger->log(
            'ADMIN: EDIT ROOM CODE',
            'success',
            'room',
            $room_id,
            [
                'room_id' => $room_id,
                'new_room_code' => $room_code,
                'old_room_code' => $decoded_allRoomInfo['room_code'],
            ]
        );
    }

    header("Location: /admin-room-edit?room_id={$room_id}");
    exit();

} elseif (isset($_POST['delete'])) {
    $db->query('delete from rooms where room_id = :id', [
        ':id' => $room_id,
    ]);

    $logger->log(
        'ADMIN: DELETE ROOM',
        'success',
        'room',
        $room_id,
        [
            'deleted_room_id' => $room_id
        ]
    );

    header("Location: /admin-rooms");
    exit();

} elseif (isset($_POST['add_student'])) {
    $student_id = $_POST['student_id'];
    
    // Verify student exists
    $studentExists = $db->query('select count(*) as count from accounts where school_id = :school_id', [
        ':school_id' => $student_id
    ])->find();

    if ($studentExists['count'] == 0) {
        header("Location: /admin-room-edit?room_id={$room_id}&error=student_not_found");
        exit();
    }

    // Check if student is already in the room
    $alreadyInRoom = $db->query('select count(*) as count from room_list where room_id = :room_id and school_id = :student_id', [
        ':room_id' => $room_id,
        ':student_id' => $student_id
    ])->find();

    if ($alreadyInRoom['count'] > 0) {
        header("Location: /admin-room-edit?room_id={$room_id}&error=student_already_in_room");
        exit();
    }

    // Add student to room
    $db->query('insert into room_list (room_id, school_id) values (:room_id, :student_id)', [
        ':room_id' => $room_id,
        ':student_id' => $student_id
    ]);

    $logger->log(
        'ADMIN: ADD STUDENT TO ROOM',
        'success',
        'room',
        $room_id,
        [
            'room_id' => $room_id,
            'student_id' => $student_id
        ]
    );

    header("Location: /admin-room-edit?room_id={$room_id}");
    exit();

} elseif (isset($_POST['remove_student'])) {
    $student_id = $_POST['student_id'];

    $db->query('delete from room_list where room_id = :room_id and school_id = :student_id', [
        ':room_id' => $room_id,
        ':student_id' => $student_id
    ]);

    $logger->log(
        'ADMIN: REMOVE STUDENT FROM ROOM',
        'success',
        'room',
        $room_id,
        [
            'room_id' => $room_id,
            'student_id' => $student_id
        ]
    );

    header("Location: /admin-room-edit?room_id={$room_id}");
    exit();

} elseif (isset($_POST['remove_group'])) {
    $group_index = $_POST['group_index'];
    
    // Get current groups
    $current_groups = $db->query('select groups_json from room_groups where room_id = :room_id', [
        ':room_id' => $room_id
    ])->find();

    if ($current_groups) {
        $groups = json_decode($current_groups['groups_json'], true);
        array_splice($groups, $group_index, 1);  // Remove the group at index

        // Update groups
        $db->query('update room_groups set groups_json = :groups_json where room_id = :room_id', [
            ':groups_json' => json_encode($groups),
            ':room_id' => $room_id
        ]);

        $logger->log(
            'ADMIN: REMOVE GROUP FROM ROOM',
            'success',
            'room',
            $room_id,
            [
                'room_id' => $room_id,
                'group_index' => $group_index
            ]
        );
    }

    header("Location: /admin-room-edit?room_id={$room_id}");
    exit();
}



