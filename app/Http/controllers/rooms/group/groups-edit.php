<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$room_info = $db->query('select * from rooms where room_id = :room_id', [
    ':room_id'=> $_GET['room_id'],
])->find();

if ($room_info['school_id'] == $currentUser) {
    $roomGroups = $db->query('select * from room_groups where room_id = :room_id', [
        ':room_id' => $_GET['room_id']
    ])->find();

    $groups = json_decode($roomGroups['groups_json'], true);

    foreach($groups as &$group) {
        foreach($group as &$member){
            if (str_contains($member[0], '+')) {
                $names = explode("+", $member[0]);
                $member[0] = "{$names[0]} {$names[1]}";
            }
        }
    }

    $groups_json = $roomGroups['groups_json'];

    view("rooms/groups/groups-edit.view.php", [
        'groups' => $groups,
        'groups_json' => $groups_json
    ]);

} else {
    abort(403);
}

// $groups_json = $_POST['grouped'];
// $groups = json_decode($groups_json, true);

// foreach($groups as &$group) {
//     foreach($group as &$member){
//         $names = explode("+", $member[0]);
//         $member[0] = "{$names[0]} {$names[1]}";
//     }
// }

// view("rooms/groups/groups-edit.view.php", [
//     'groups' => $groups,
//     'groups_json' => $groups_json
// ]);