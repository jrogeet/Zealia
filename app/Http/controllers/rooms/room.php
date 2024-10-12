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


    $encodedRoomInfo = json_encode($room_info);

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
        $idNtype[] = $db->query('select school_id, l_name, f_name, result, r, i, a, s, e, c from accounts where school_id = :stu_id', [
            ':stu_id' => $stu['school_id'],
        ])->find();
    }

    // UNFILTERED ID and TYPES (with and without personality_type)
        // NO personality_type = "N/A"
    $idNRiasec = [];
    foreach ($idNtype as $index => $student) {
        $idNRiasec[$index] = [
            'school_id' => $student['school_id'],
            'result' => $student['result'] ?? 'N/A'
        ];

        if($student['result'] === null) {
            $idNRiasec[$index]['result'] = 'N/A';
        } else {
            $idNRiasec[$index]['name'] = "{$student['f_name']}+{$student['l_name']}";
            $idNRiasec[$index][$student['result'][0]] = $student[strtolower($student['result'][0])];
            $idNRiasec[$index][$student['result'][1]] = $student[strtolower($student['result'][1])];
            $idNRiasec[$index][$student['result'][2]] = $student[strtolower($student['result'][2])];
        }
    }

    
    // FILTERED ID and Personality_type
        // $filteredidNRiasec = students with personality_type
        // $stuNoType = students without personality_Type
    $filteredidNRiasec = [];
    $stuNoType = [];
    foreach($idNRiasec as $index => $student) {
        if($student['result'] !== null) {
            $filteredidNRiasec[] = $student;
        } else {
            $stuNoType[] = $student;
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

        foreach($decodedGroup as &$group) {
            foreach($group as &$member){
                if (str_contains($member[0], '+')) {
                    $names = explode("+", $member[0]);
                    $member[0] = "{$names[0]} {$names[1]}";
                }

                // foreach ($stu_info as $student) {
                //     if($member[1] === $student['school_id']) {
                //         $group[] = $student['kanban'];
                //     }
                // }
                foreach ($stu_info as $student) {
                    if(isset($member[1]) && $member[1] === $student['school_id']) {
                        // Check if 'kanban' key exists in $student array
                        if (isset($student['kanban'])) {
                            $member[] = json_decode($student['kanban'], true);
                        } else {
                            $member[] = "";
                        }
                    }
                }
            }
        }

        $kanban_json = $db->query('select kanban from accounts where school_id = :school_id', [
            ':school_id' => $currentUser
        ])->find();

        // $kanban_decoded = json_decode($kanban_json, true);

        view('rooms/room.view.php', [
            'stu_info' => $stu_info, // STUDENTS LIST
            'encodedstu_info' => $encodedstu_info,
            'room_info' => $room_info,
            'encodedRoomInfo' => $encodedRoomInfo,
            'prof_name' => $prof_name,
            'stu_id'=> $stu_id,
            'requests'=>$requests,
            'idNRiasec' => $idNRiasec,
            'filteredidNRiasec' => $filteredidNRiasec,
            'encodedFilteredidNRiasec' => $encodedFilteredidNRiasec,
            'stuNoType' => $stuNoType,
            'encodedStuNoType' => $encodedStuNoType,
            'decodedGroup' => $decodedGroup,
            'encodedGroup' =>$encodedGroup,
            'roomHasGroup' => $roomHasGroup,
            'idNtype' => $idNtype,
            // 'kanban' => $kanban_decoded,
        ]);
    } else {
        view('rooms/room.view.php', [
            'stu_info' => $stu_info, // STUDENTS LIST
            'encodedstu_info' => $encodedstu_info,
            'room_info' => $room_info,
            'encodedRoomInfo' => $encodedRoomInfo,
            'prof_name' => $prof_name,
            'stu_id'=> $stu_id,
            'requests'=>$requests,
            'idNRiasec' => $idNRiasec,
            'filteredidNRiasec' => $filteredidNRiasec,
            'encodedFilteredidNRiasec' => $encodedFilteredidNRiasec,
            'stuNoType' => $stuNoType,
            'encodedStuNoType' => $encodedStuNoType,
            'roomHasGroup' => $roomHasGroup,
            'idNtype' => $idNtype,
        ]);
    }

} else {
    abort(403);
}

