<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === 'student') {
    $stuIsMember = $db->query('select * from room_list where room_id = :room_id and school_id = :student' , [
        ':room_id'=>$_GET['room_id'],
        ':student'=> $currentUser,
    ])->find();

    $valid = $stuIsMember;
} elseif ($_SESSION['user']['account_type'] === 'professor') {
    $roomIsProfs = $db->query('select * from rooms where room_id = :room_id and school_id = :prof_id', [
        ':room_id'=>$_GET['room_id'],
        ':prof_id'=>$currentUser,
    ])->find();
    $valid = $roomIsProfs;
}





if ($valid) {
        // Room Infos: Room Name, Professor ID, Room Code
        // room_name, school_id, room_code

// School ID of All Room Members
    $stu_id = $db->query('select school_id from room_list where room_id = :room_id' , [
        ':room_id'=>$_GET['room_id'],
    ])->findAll();

    $room_info = $db->query('select * from rooms where room_id = :room_id', [
        ':room_id'=>$_GET['room_id']
    ])->find();

    $prof_name = $db->query('select l_name, f_name from accounts where school_id = :prof_id', [
        ':prof_id' =>$room_info['school_id']
    ])->find();



    // List of Students included in the Room
    // store each student school_id in $stu_id:
        // all data of students in the room
    $stu_info = [];
    foreach ($stu_id as $student) {
        $stu_info[] = $db->query('select * from accounts where school_id = :stu_id', [
            ':stu_id'=>$student['school_id'],
        ])->find();
    }

    $encodedstu_info = json_encode($stu_info);

    // ID and MBTI Type of student for GROUPINGS:
    $idNtype = [];
    foreach ($stu_info as $stu) {
        $idNtype[] = $db->query('select school_id, personality_type, l_name, f_name from accounts where school_id = :stu_id', [
            ':stu_id' => $stu['school_id'],
        ])->find();
    }

    // UNFILTERED ID and TYPES (with and without personality_type)
        // NO personality_type = "N/A"
    $idNmbti = [];
    foreach ($idNtype as $index) {
        if($index['personality_type'] === null) {
            $type = "N/A";
            $idNmbti[] = "{$index['school_id']} {$type}";
        } else {
            $idNmbti[] = "{$index['school_id']} {$index['personality_type']}";
        }
    }

    
    // FILTERED ID and Personality_type
        // $filteredidNmbti = students with personality_type
        // $stuNoType = students without personality_Type
    $filteredidNmbti = [];
    $stuNoType = [];
    foreach($idNtype as $index) {
        if($index['personality_type'] !== null) {
            


            $filteredidNmbti[] = "{$index['l_name']} {$index['f_name']}+{$index['personality_type']}";
        } else {
            $stuNoType[] = "{$index['l_name']} {$index['f_name']}";
        }
    }

    $encodedFilteredidNmbti = json_encode($filteredidNmbti);
    $encodedStuNoType = json_encode($stuNoType);


    $allfilteredidNmbti = [];


    // ROOM JOIN REQUESTS:
    $allRequests = $db->query('select * from join_room_requests where room_id = :room_id', [
        ':room_id'=> $_GET['room_id'],
    ])->findAll();

    $requests = [];
    foreach ($allRequests as $request) {
        $isAlrMem = $db->query('select * from room_list where room_id = :room_id and school_id = :school_id', [
            ':room_id'=> $_GET['room_id'],
            ':school_id'=> $request['school_id'],
        ])->find();
        
        if (! $isAlrMem) {
            $requests[] = $db->query('select school_id, email, l_name, f_name from accounts where school_id = :school_id', [
                ':school_id'=>$request['school_id']
            ])->find();
        }
    }


    // $groupID = $db->query('select group_id from sections_groups where room_id = :room_id', [
    //     ':room_id' => $_GET['room_id'],
    // ])->find();


    // $decodedGroup = $db->query('select * from groups_list where group_id = :group_id', [
    //     ':group_id' => $groupID['group_id']
    // ]);

    $roomHasGroup = $db->query('select * from room_groups where room_id = :room_id', [
        ':room_id' => $_GET['room_id']
    ])->find();

    $notifications = $db->query('SELECT * FROM notifications WHERE receiver_id = :user ORDER BY notif_time DESC', [
        ':user'=>$currentUser
    ])->findAll();

    foreach($notifications as &$notification) {
        $sender_name = $db->query('SELECT l_name, f_name from accounts where school_id = :id', [
            ':id' => $notification['sender_id'] 
        ])->find();

        $room_name = $db->query('SELECT room_name from rooms where room_id = :room_id',[
            'room_id' => $notification['room_id']
        ])->find();

        $notification['sender_name'] = "{$sender_name['f_name']} {$sender_name['l_name']}";
        $notification['room_name'] = $room_name['room_name'];
    }



    if ($roomHasGroup) {
        $decodedGroup = json_decode($roomHasGroup['groups_json'], true);
        $encodedGroup = json_encode($decodedGroup);

        view('rooms/show.view.php', [
            'heading' => 'Show Room',
            'stu_info' => $stu_info, // STUDENTS LIST
            'encodedstu_info' => $encodedstu_info,
            'room_info' => $room_info,
            'prof_name' => $prof_name,
            'stu_id'=> $stu_id,
            'requests'=>$requests,
            'idNmbti' => $idNmbti,
            'filteredidNmbti' => $filteredidNmbti,
            'encodedFilteredidNmbti' => $encodedFilteredidNmbti,
            'stuNoType' => $stuNoType,
            'encodedStuNoType' => $encodedStuNoType,
            'decodedGroup' => $decodedGroup,
            'encodedGroup' =>$encodedGroup,
            'roomHasGroup' => $roomHasGroup,
            'idNtype' => $idNtype,
            'notifications' => $notifications
        ]);
    } else {
        view('rooms/show.view.php', [
            'heading' => 'Show Room',
            'stu_info' => $stu_info, // STUDENTS LIST
            'encodedstu_info' => $encodedstu_info,
            'room_info' => $room_info,
            'prof_name' => $prof_name,
            'stu_id'=> $stu_id,
            'requests'=>$requests,
            'idNmbti' => $idNmbti,
            'filteredidNmbti' => $filteredidNmbti,
            'encodedFilteredidNmbti' => $encodedFilteredidNmbti,
            'stuNoType' => $stuNoType,
            'encodedStuNoType' => $encodedStuNoType,
            'roomHasGroup' => $roomHasGroup,
            'notifications' => $notifications
        ]);
    }



} else {
    abort(403);
}

