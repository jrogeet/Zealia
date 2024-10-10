<?php

// CREATE ROOM
use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];


if (isset($_POST['create'])) {
    $room_info = json_decode($_POST['encoded_room_info'], true);
    $ascending_rooms = json_decode($_POST['asc'], true);
    $descending_rooms = json_decode($_POST['desc'], true);
    
    $errors = [];

    if (! Validator::string($_POST['room_name'], 1, 100)) {
        $errors['room_name'] = 'A room name of no more than 100 characters is required.';
    }

    if(! empty($errors)) {
        return view('rooms/dashboard.view.php', [
            'errors' => $errors,
            'room_info' => $room_info,
            'descending_rooms' => $descending_rooms,
            'ascending_rooms' => $ascending_rooms,
        ]);
    }


    // Generate Random 6-digit code & check if it already exists within room_code column in rooms
    $i = 0;
    while ($i === 0) {
        $unique_number =  rand(100000, 999999);
        $checkCode = $db->query('select room_code from rooms where room_code = :u_num', [
            ':u_num' => $unique_number
        ])->find();

        if($checkCode !== false ){
            continue;
        } else {
            $room_code = (string) $unique_number;
            dd($room_code);
            $i++;
        }
    }

    $db->query('INSERT INTO rooms (room_name, school_id, room_code) VALUES (:room_name, :prof_id, :room_code)', [
        ':room_name'=> trim($_POST['room_name']),
        ':room_code' => $room_code,
        ':prof_id' => $currentUser
    ]);
    // header("Location: {$_SESSION['current_type']}/dashboard");
    header("Location: /dashboard");
    die();
} elseif (isset($_POST['join'])) {
    $code = filter_input(INPUT_POST, "room_code", FILTER_SANITIZE_NUMBER_INT);

    $errors = [];

    $roomExistence = $db->query('select * from rooms where room_code = :code', [
        ':code' => $code
    ])->find();

    if (! $roomExistence) {
        $errors['room_existence'] = "Input a Valid Room Code / Code doesn't match any rooms.";
        header("Location: /dashboard");
        die();
    } else {
        
        $isAlrJoined = $db->query('select * from room_list where room_id  = :room and school_id = :student', [
            ':student'=>$currentUser,
            ':room' => $roomExistence['room_id']
        ])->find();

        
        if ($isAlrJoined) {
            $errors['is_joined'] = 'You are already joined in this room!';
        } else {

            $db->query('INSERT INTO join_room_requests(school_id, room_id) VALUES (:student, :room)', [
                ':student'=>$currentUser,
                ':room'=>$roomExistence['room_id']
            ]);

            // NOTIFICATIONS

            $db->query('INSERT INTO notifications(sender_id, receiver_id, room_id, notif_type) VALUES (:student, :prof, :room, :type)', [
                ':student'=>$currentUser,
                ':prof'=>$roomExistence['school_id'],
                ':room'=>$roomExistence['room_id'],
                ':type'=>'join_room'
            ]);

            $db->query('INSERT INTO notifications(sender_id, receiver_id, room_id, notif_type) VALUES (:student, :prof, :room, :type)', [
                ':student'=>$currentUser,
                ':prof'=>$currentUser,
                ':room'=>$roomExistence['room_id'],
                ':type'=>'prejoin'
            ]);
        }

        if(! empty($errors)) {
            header("Location: /dashboard");
            die();
        }


        header("Location: /dashboard");
        die();
    }
} elseif (isset($_POST['search'])) {
    unset($_POST['search']);
    $search_input = $_POST['search_input'] ?? '';
    $year = $_POST['year'] ?? '';
    $section = $_POST['section'] ?? '';
    $program = $_POST['program'] ?? '';
    $encoded_room_info = $_POST['encoded_room_info'] ?? '';

    $room_info = json_decode($encoded_room_info, true);

    $searched_rooms = [];
    foreach ($room_info as $room) {
        $matches_search_input = stripos($room['room_name'], $search_input) !== false || stripos($room['room_code'], $search_input) !== false;
        $matches_year = !$year || stripos($room['year_level'], $year) !== false;
        $matches_section = !$section || stripos($room['section'], $section) !== false;
        $matches_program = !$program || stripos($room['program'], $program) !== false;

        if ($matches_search_input && $matches_year && $matches_section && $matches_program) {
            $searched_rooms[] = $room;
        }
    }

    // Sort ascending
    $ascending_rooms = $searched_rooms;
    usort($ascending_rooms, function($a, $b) {
        return strtotime($a['created_date']) - strtotime($b['created_date']);
    });

    // Sort descending
    $descending_rooms = $searched_rooms;
    usort($descending_rooms, function($a, $b) {
        return strtotime($b['created_date']) - strtotime($a['created_date']);
    });

    view('rooms/dashboard.view.php', [
        'room_info' => $searched_rooms,
        'ascending_rooms' => $ascending_rooms,
        'descending_rooms' => $descending_rooms,
        'encoded_room_info' => $encoded_room_info
    ]);
}


// elseif (isset($_POST['search'])) {
//     unset($_POST['search']);
//     $search_input = $_POST['search_input'] ?? '';
//     $encoded_room_info = $_POST['encoded_room_info'] ?? '';

//     $room_info = json_decode($encoded_room_info, true);

//     $searched_rooms = [];
//     foreach ($room_info as $room) {
//         if (stripos($room['room_name'], $search_input) !== false || stripos($room['room_code'], $search_input) !== false) {
//             $searched_rooms[] = $room;
//         }
//     }

//     // Sort ascending
//     $ascending_rooms = $searched_rooms;
//     usort($ascending_rooms, function($a, $b) {
//         return strtotime($a['created_date']) - strtotime($b['created_date']);
//     });

//     // Sort descending
//     $descending_rooms = $searched_rooms;
//     usort($descending_rooms, function($a, $b) {
//         return strtotime($b['created_date']) - strtotime($a['created_date']);
//     });

//     view('rooms/dashboard.view.php', [
//         'room_info' => $searched_rooms,
//         'ascending_rooms' => $ascending_rooms,
//         'descending_rooms' => $descending_rooms,
//         'encoded_room_info' => $encoded_room_info
//     ]);
// }




// <?php

// // CREATE ROOM
// use Core\Validator;

// use Model\Database;
// use Model\App;

// $db = App::resolve(Database::class);

// $currentUser = $_SESSION['user']['school_id'];


// if (isset($_POST['create'])) {
//     $room_info = json_decode($_POST['encoded_room_info'], true);
    
//     $errors = [];

//     if (! Validator::string($_POST['room_name'], 1, 100)) {
//         $errors['room_name'] = 'A room name of no more than 100 characters is required.';
//     }

//     if(! empty($errors)) {
//         return view('rooms/dashboard.view.php', [
//             'heading' => 'Create Room',
//             'errors' => $errors,
//             'room_info' => $room_info
//         ]);
//     }


//     // Generate Random 6-digit code & check if it already exists within room_code column in rooms
//     $i = 0;
//     while ($i === 0) {
//         $unique_number =  rand(100000, 999999);
//         $checkCode = $db->query('select room_code from rooms where room_code = :u_num', [
//             ':u_num' => $unique_number
//         ])->find();

//         if($checkCode !== false ){
//             continue;
//         } else {
//             $room_code = (string) $unique_number;
//             dd($room_code);
//             $i++;
//         }
//     }

//     $db->query('INSERT INTO rooms (room_name, school_id, room_code) VALUES (:room_name, :prof_id, :room_code)', [
//         ':room_name'=> trim($_POST['room_name']),
//         ':room_code' => $room_code,
//         ':prof_id' => $currentUser
//     ]);
//     // header("Location: {$_SESSION['current_type']}/dashboard");
//     header("Location: /dashboard");
//     die();
// } elseif (isset($_POST['join'])) {
//     $code = filter_input(INPUT_POST, "room_code", FILTER_SANITIZE_NUMBER_INT);

//     $errors = [];

//     $roomExistence = $db->query('select * from rooms where room_code = :code', [
//         ':code' => $code
//     ])->find();

//     if (! $roomExistence) {
//         $errors['room_existence'] = "Input a Valid Room Code / Code doesn't match any rooms.";
//         header("Location: /dashboard");
//         die();
//     } else {
        
//         $isAlrJoined = $db->query('select * from room_list where room_id  = :room and school_id = :student', [
//             ':student'=>$currentUser,
//             ':room' => $roomExistence['room_id']
//         ])->find();

        
//         if ($isAlrJoined) {
//             $errors['is_joined'] = 'You are already joined in this room!';
//         } else {

//             $db->query('INSERT INTO join_room_requests(school_id, room_id) VALUES (:student, :room)', [
//                 ':student'=>$currentUser,
//                 ':room'=>$roomExistence['room_id']
//             ]);

//             // NOTIFICATIONS

//             $db->query('INSERT INTO notifications(sender_id, receiver_id, room_id, notif_type) VALUES (:student, :prof, :room, :type)', [
//                 ':student'=>$currentUser,
//                 ':prof'=>$roomExistence['school_id'],
//                 ':room'=>$roomExistence['room_id'],
//                 ':type'=>'join_room'
//             ]);

//             $db->query('INSERT INTO notifications(sender_id, receiver_id, room_id, notif_type) VALUES (:student, :prof, :room, :type)', [
//                 ':student'=>$currentUser,
//                 ':prof'=>$currentUser,
//                 ':room'=>$roomExistence['room_id'],
//                 ':type'=>'prejoin'
//             ]);
//         }

//         if(! empty($errors)) {
//             header("Location: /dashboard");
//             die();
//         }


//         header("Location: /dashboard");
//         die();
//     }
// } elseif (isset($_POST['search'])) {
//     unset($_POST['search']);
//     $search_input = $_POST['search_input'] ?? '';
//     $encoded_room_info = $_POST['encoded_room_info'] ?? '';

//     $room_info = json_decode($encoded_room_info, true);

//     $searched_rooms = [];
//     foreach ($room_info as $room) {
//         if (stripos($room['room_name'], $search_input) !== false || stripos($room['room_code'], $search_input) !== false) {
//             $searched_rooms[] = $room;
//         }
//     }

//     // Sort ascending
//     $ascending_rooms = $searched_rooms;
//     usort($ascending_rooms, function($a, $b) {
//         return strtotime($a['created_date']) - strtotime($b['created_date']);
//     });

//     // Sort descending
//     $descending_rooms = $searched_rooms;
//     usort($descending_rooms, function($a, $b) {
//         return strtotime($b['created_date']) - strtotime($a['created_date']);
//     });

//     view('rooms/dashboard.view.php', [
//         'heading' => 'My Dashboard',
//         'room_info' => $room_info,
//         'searched_rooms' => $searched_rooms,
//         'ascending_rooms' => $ascending_rooms,
//         'descending_rooms' => $descending_rooms,
//         'encoded_room_info' => $encoded_room_info
//         // 'prof_info' => $prof_info,
//         // 'encoded_prof_info' => $encoded_prof_info
//     ]);
// }




