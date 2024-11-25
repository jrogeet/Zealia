<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$room_id = $_GET['room_id'];
$groupNum = $_GET['group'];

try {
    $roomInfo = $db->query('select * from rooms where room_id = :room_id', [
        ':room_id' => $room_id
    ])->find();


    if ($currentUser == $roomInfo['school_id']) {
        $roomGroups = $db->query('select * from room_groups where room_id = :room_id', [
            ':room_id' => $room_id
        ])->find();
    
        $groups = json_decode($roomGroups['groups_json'], true);
        unset($roomGroups);
        $group = $groups[$groupNum];
        unset($groups);

        foreach($group as &$member){
            if (str_contains($member[0], '+')) {
                $names = explode("+", $member[0]);
                $member[0] = "{$names[0]} {$names[1]}";
            }
        }
        
        $groupHistory = $db->query('SELECT * FROM group_edit_history WHERE room_id = :room_id AND (from_group = :group OR to_group = :group) ORDER BY timestamp DESC', [
            ':room_id' => $room_id,
            ':group' => $groupNum,
        ])->findAll();
        
        foreach($groupHistory as &$history) {
            foreach ($stu_info as $stu) {
                if ($history['school_id'] == $stu['school_id']) {
                    $history['name'] = "{$stu['f_name']} {$stu['l_name']}";
                }
            }
        }

        $tasks = [];
        foreach ($group as &$member){
            $kanban = $db->query('SELECT kanban FROM accounts WHERE school_id = :school_id', [
                'school_id' => $member[1]
            ])->find();
            
            $member[] = $kanban['kanban'];
        }

        view("rooms/groups/view-group.view.php", [
            'group' => $group,
            'groupHistory' => $groupHistory,
        ]);
    } else {
        abort(403);
    }

} catch (Exception $e) {
    abort(0);
}