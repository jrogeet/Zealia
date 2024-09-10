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

    // ID and RIASEC Type of student for GROUPINGS:
    $idNtype = [];
    foreach ($stu_info as $stu) {
        $idNtype[] = $db->query('select school_id, result, l_name, f_name from accounts where school_id = :stu_id', [
            ':stu_id' => $stu['school_id'],
        ])->find();
    }

    // UNFILTERED ID and TYPES (with and without personality_type)
        // NO personality_type = "N/A"
    $idNRiasec = [];
    foreach ($idNtype as $index) {
        if($index['result'] === null) {
            $type = "N/A";
            $idNRiasec[] = "{$index['school_id']} {$type}";
        } else {
            $idNRiasec[] = "{$index['school_id']} {$index['result']}";
        }
    }

    
    // FILTERED ID and Personality_type
        // $filteredidNmbti = students with personality_type
        // $stuNoType = students without personality_Type
    $filteredidNRiasec = [];
    $stuNoType = [];
    foreach($idNtype as $index) {
        if($index['result'] !== null) {
            $filteredidNRiasec[] = "{$index['l_name']} {$index['f_name']}+{$index['result']}";
        } else {
            $stuNoType[] = "{$index['l_name']} {$index['f_name']}";
        }
    }

    $encodedFilteredidNRiasec = json_encode($filteredidNRiasec);
    $encodedStuNoType = json_encode($stuNoType);


    $allfilteredidNRiasec = [];


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

    if ($roomHasGroup) {
        $decodedGroup = json_decode($roomHasGroup['groups_json'], true);
        $encodedGroup = json_encode($decodedGroup);

        view('rooms/show.view.php', [
            'stu_info' => $stu_info, // STUDENTS LIST
            'encodedstu_info' => $encodedstu_info,
            'room_info' => $room_info,
            'prof_name' => $prof_name,
            'stu_id'=> $stu_id,
            'requests'=>$requests,
            'idNmbti' => $idNRiasec,
            'filteredidNmbti' => $filteredidNRiasec,
            'encodedFilteredidNmbti' => $encodedFilteredidNRiasec,
            'stuNoType' => $stuNoType,
            'encodedStuNoType' => $encodedStuNoType,
            'decodedGroup' => $decodedGroup,
            'encodedGroup' =>$encodedGroup,
            'roomHasGroup' => $roomHasGroup,
            'idNtype' => $idNtype,
        ]);
    } else {
        view('rooms/show.view.php', [
            'stu_info' => $stu_info, // STUDENTS LIST
            'encodedstu_info' => $encodedstu_info,
            'room_info' => $room_info,
            'prof_name' => $prof_name,
            'stu_id'=> $stu_id,
            'requests'=>$requests,
            'idNmbti' => $idNRiasec,
            'filteredidNmbti' => $filteredidNRiasec,
            'encodedFilteredidNmbti' => $encodedFilteredidNRiasec,
            'stuNoType' => $stuNoType,
            'encodedStuNoType' => $encodedStuNoType,
            'roomHasGroup' => $roomHasGroup,
        ]);
    }



} else {
    abort(403);
}

