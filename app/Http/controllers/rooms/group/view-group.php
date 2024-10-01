<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$room_info = $db->query('select * from rooms where room_id = :room_id', [
    ':room_id'=> $_GET['room_id'],
])->find();

if ($room_info['school_id'] == $currentUser) {
    $room_id = $_GET['room_id'];
    $group = $_GET['group'];

    $roomGroups = $db->query('select * from room_groups where room_id = :room_id', [
        ':room_id' => $room_id
    ])->find();

    $stu_id = $db->query('select school_id from room_list where room_id = :room_id' , [
        ':room_id'=> $room_id,
    ])->findAll();

    $stu_info = [];
    foreach ($stu_id as $student) {
        $stu_info[] = $db->query('select * from accounts where school_id = :stu_id', [
            ':stu_id'=>$student['school_id'],
        ])->find();
    }

    $groups = json_decode($roomGroups['groups_json'], true);

    foreach($groups[$group] as &$member){
        if (str_contains($member[0], '+')) {
            $names = explode("+", $member[0]);
            $member[0] = "{$names[0]} {$names[1]}";
        }
    }

    $groups_json = $roomGroups['groups_json'];

    $groupHistory = $db->query('SELECT * FROM group_edit_history WHERE room_id = :room_id AND (from_group = :group OR to_group = :group) ORDER BY timestamp DESC', [
        ':room_id' => $room_id,
        ':group' => $group,
    ])->findAll();

    foreach($groupHistory as &$history) {
        foreach ($stu_info as $stu) {
            if ($history['school_id'] == $stu['school_id']) {
                $history['name'] = "{$stu['f_name']} {$stu['l_name']}";
            }
        }
    }

    view("rooms/groups/view-group.view.php", [
        'group' => $groups,
        'groups_json' => $groups_json,
        'groupHistory' => $groupHistory,
    ]);

} else {
    abort(403);
}