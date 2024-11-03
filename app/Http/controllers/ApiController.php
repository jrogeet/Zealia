<?php

namespace App\Http\Controllers;
use Model\Database;
use Model\App;
use Core\Validator;

class ApiController
{
    private $db;
    private $currentUser;

    public function __construct()
    {
        // session_start();
        $this->db = App::resolve(Database::class);
        $this->currentUser = $_SESSION['user']['school_id'] ?? null;
        session_write_close();
    }

    public function handleGet($action, $params = [])
    {
        switch ($action) {
            case 'getLatestData':
                return $this->getLatestData($params);
            case 'getMoreContent':
                return $this->getMoreContent($params);
            default:
                return $this->notFound();
        }
    }

    public function handlePost($action, $params = [])
    {
        switch ($action) {
            case 'search':
                return $this->search($params);
            case 'submitForm':
                return $this->submitForm($params);
            case 'toggleLike':
                return $this->toggleLike($params);
            default:
                return $this->notFound();
        }
    }

    public function search($params)
    {
        $searchTerm = $params['search'] ?? '';
        // echo $params['search'];

        $results = $this->db->query('SELECT * FROM rooms WHERE room_name LIKE :searchTerm OR room_code LIKE :searchTerm', [
            'searchTerm' => '%' . $searchTerm . '%',
        ])->findAll();

        foreach ($results as &$result) {
            $profInfo = $this->db->query('SELECT f_name, l_name FROM accounts WHERE school_id = :school_id', [
                'school_id'=> $result['school_id'],
            ])->find();

            $profInfo['prof_name'] = $profInfo['f_name'] . ' ' . $profInfo['l_name'];
            unset($profInfo['f_name']); unset($profInfo['l_name']);
            if (!empty($profInfo)) {
                $result = array_merge($result, $profInfo);
            }
        }

        // echo 'Results:';
        // dd($results);

        header('Content-Type: application/json');
        echo json_encode($results);
    }

// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
//              START OF  LATEST DATA             //
// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv

private function getLatestData($params)
{
    try {
        $mulTables = [];

        // DETERMINES IF MULTIPLE OR SINGLE TABLE
        if (isset($params['table1']) && !(isset($params['table']))) { // If Multiple Tables ang finefetch:
            foreach ($params as $key =>  $value) {
                if (str_contains($key, 'table')) {
                    $mulTables[$key] =  $value;
                    unset($params[$key]);
                }
            }
            // echo "Determined it's Multiple Tables!";
            // dd(empty($mulTables));
        } else { // If Single Table lang:
            $table = $params['table'] ?? 'rooms';
            unset($params['table']);
        }


        if (isset($params['currentPage'])) {    // Just for some shit to be specific on which page it is being used
            $currentPage = $params['currentPage'] ?? '';
            unset($params['currentPage']);
        }

        // For Sections Filter in Dashboard 
        $fetchUniqueSections = $params['fetch_unique_sections'] ?? false;
        if ($fetchUniqueSections) {
            $query = "SELECT DISTINCT section FROM rooms ORDER BY section";
            $uniqueSections = $this->db->query($query)->findAll();
            
            header('Content-Type: application/json');
            //  dd($uniqueSections);
            echo json_encode(['data' => $uniqueSections]);
            exit;
        }

        $conditions = $params['conditions'] ?? [];
        // dd($conditions);

        $orderBy = $params['order_by'] ?? '';
            unset($params['order_by']);
        $direction = $params['direction'] ?? '';
            unset($params['direction']);
        $limit = $params['limit'] ?? '';
            unset($params['limit']);



        // TABLES
        // dd($conditions);
        
        // *******************************
        // Initial Fetching from Tables: *
        // *******************************

        // Multiple Tables
        if (!empty($mulTables)) {
            // echo "UMPISA NG MULTIPLE TABLES";
            $latestData = [];
            $orders = [];

            // Determine and Set yung mga order
            if (isset($params['order_by_rooms'])) {
                // echo "table ay rooms" . $params['order_by_rooms'];
                $orders['order_by_rooms'] = $params['order_by_rooms']; 
                unset($params['order_by_rooms']);                 // Unset the orders (para di masama sa foreach for Conditions)
            } 
            
            if (isset($params['order_by_accounts'])) {
                // echo "table ay accounts" . $params['order_by_accounts'];
                $orders['order_by_accounts'] = $params['order_by_accounts']; 
                unset($params['order_by_accounts']);                 // Unset the orders (para di masama sa foreach for Conditions)
            }


            // Iterate through each table:
            foreach ($mulTables as $tableKey => $tableName) {
                $query = "SELECT * FROM {$tableName} ";

                // Set the ORDER query based on which TABLE
                if (isset($orders['order_by_rooms']) && $tableName == "rooms") {
                    $orderBy = $orders['order_by_rooms'] ?? '';
                } elseif (isset($orders['order_by_accounts']) && $tableName == "accounts") {
                    $orderBy = $orders['order_by_accounts'] ?? '';
                }

                // sets CONDITIONS for query
                foreach ($params as $key => $value) {
                    $conditions[$key] = $value;
                }
                // dd($conditions);

                // iterate through each CONDITIONS and add them to the QUERY
                if (!empty($conditions)) {
                    $query .= " WHERE " . implode(' AND ', array_map(function($key) {
                        return "{$key} = :{$key}"; // Correctly use the key for the placeholder
                    }, array_keys($conditions)));
                }

                // echo 'tibol nem at order bai: ' . $tableName . '   ' .  $orderBy . '  ';

                // THIS ERRORS IN STUDENT DASHBOARD
                // adds these to the QUERY if they are set
                if ($orderBy !== '') {
                    $query .= " ORDER BY {$orderBy}";
                }
    
                if ($direction !== '' ) {
                    $query .= " {$direction}";
                }
    
                if ($limit !== '') {
                    $query .= " LIMIT {$limit}"; 
                }
                
                // echo $query;
                // Execute the query
                $latestData[$tableName] = $this->db->query($query, $conditions)->findAll();
                // echo "Multiple Tabs Query:";
                // echo "<br>";
                // echo $query;
                // echo "<br>";
                // dd($latestData);
                // echo "<br>";
            }

        } else {
            // Single Table

            foreach ($params as $key => $value) {
                $conditions[$key] = $value;
            }
            // dd($conditions);

            $query = "SELECT * FROM {$table} ";
            if (!empty($conditions)) {
                $query .= " WHERE " . implode(' AND ', array_map(function($key) {
                    return "{$key} = :{$key}"; // Correctly use the key for the placeholder
                }, array_keys($conditions)));
            }
            // THIS ERRORS IN STUDENT DASHBOARD
            if ($orderBy !== '') {
                $query .= " ORDER BY {$orderBy}";
            }
            if ($direction !== '' ) {
                $query .= " {$direction}";
            }
            if ($limit !== '') {
                $query .= " LIMIT {$limit}"; 
            }
            
            
            $latestData = $this->db->query($query, $conditions)->findAll();
        }


        // ****************************************************/
        // Fetching of Other Data Necessary: (Multiple Tables) /
        // *************************************************** /

        if (!empty($mulTables)) {
            if (isset($currentPage) && $currentPage == "room" && in_array('room_list', $mulTables)) {
                if (! empty($latestData['room_list'])) {
                    foreach ($latestData['room_list'] as &$student) {
                        $stu_info = $this->db->query('SELECT f_name, l_name, school_id, email, result FROM accounts WHERE school_id = :school_id', [
                            'school_id' => $student['school_id']
                        ])->find();
                        // dd($stu_info);
                        if (!empty($stu_info)) {
                            $student = array_merge($student, $stu_info);
                        }

                        if ($stu_info['result'] == null || $stu_info['result'] == '') {
                            $latestData['student_no_result'][] = $student;
                        } else {
                            $latestData['student_has_result'][] = [
                                'school_id' => $stu_info['school_id'],
                                'result' => $stu_info['result'],
                                'name' => $stu_info['f_name'] . ' ' . $stu_info['l_name']
                            ];
                        }
                    }
                }

                if (! empty($latestData['join_room_requests'])) {
                    foreach ($latestData['join_room_requests'] as &$student) {
                        $stu_info = $this->db->query('SELECT f_name, l_name, school_id, email, result FROM accounts WHERE school_id = :school_id', [
                            'school_id' => $student['school_id']
                        ])->find();

                        if (!empty($stu_info)) {
                            $student = array_merge($student, $stu_info);
                        }
                    }
                }
            } elseif(isset($currentPage) && $currentPage == 'admin_dashboard') {
                $total_users = $this->db->query('SELECT COUNT(*) FROM accounts WHERE account_type IN (:type1, :type2)',[
                    'type1' => 'student',
                    'type2' => 'professor',
                ])->find();

                $total_students_n_profs = $this->db->query('
                    SELECT 
                        COUNT(CASE WHEN account_type = :type1 THEN 1 END) AS total_students,
                        COUNT(CASE WHEN account_type = :type2 THEN 1 END) AS total_professors
                    FROM accounts', [
                        'type1' => 'student',
                        'type2' => 'professor',
                ])->find();

                // dd($total_students_n_profs);

                $latestData['total_users'] = $total_users['COUNT(*)'];

                $latestData['total_students'] = $total_students_n_profs['total_students'];
                $latestData['total_instructors'] = $total_students_n_profs['total_professors'];

                $total_rooms = $this->db->query('SELECT COUNT(*) FROM rooms',[
                ])->find();

                $latestData['total_rooms'] = $total_rooms['COUNT(*)'];

                foreach ($latestData['rooms'] as $index => &$room) {
                    $instructor = $this->db->query('SELECT f_name, l_name FROM accounts WHERE school_id = :id', [
                        "id" => $room['school_id'],
                    ])->find();
                    
                    $instructor['prof_name'] = $instructor['f_name'] . ' ' . $instructor['l_name'];
                    unset($instructor['f_name']); unset($instructor['l_name']);
                    if (!empty($instructor)) {
                        $room = array_merge($room, $instructor);
                    }

                    $dateString = $room['created_date'];
                    // Set the timezone to match your database's timezone
                    $timezone = new \DateTimeZone('Asia/Manila'); // Replace 'UTC' with your database's timezone if different

                    // Create a DateTime object for the given date and time
                    $givenDateTime = new \DateTime($dateString, $timezone);

                    // Get the current date and time in the same timezone
                    $currentDateTime = new \DateTime('now', $timezone);

                    // Debugging: Print the timestamps and timezones
                    error_log("Given DateTime: " . $givenDateTime->format('Y-m-d H:i:s') . " Timezone: " . $givenDateTime->getTimezone()->getName());
                    error_log("Current DateTime: " . $currentDateTime->format('Y-m-d H:i:s') . " Timezone: " . $currentDateTime->getTimezone()->getName());

                    // Calculate the difference between the current time and the given time
                    $interval = $givenDateTime->diff($currentDateTime); // Note the order here

                    // Extract days, hours, and minutes from the interval
                    $daysAgo = $interval->days;
                    $hoursAgo = $interval->h;
                    $minutesAgo = $interval->i;

                    $room['daysAgo'] = $daysAgo;
                    $room['hoursAgo'] = $hoursAgo;
                    $room['minutesAgo'] = $minutesAgo;
                }

                foreach ($latestData['accounts'] as $index => &$account) {
                    $dateString = $account['reg_date'];
            
                    // Set the timezone to match your database's timezone
                    $timezone = new \DateTimeZone('Asia/Manila'); // Replace 'UTC' with your database's timezone if different
            
                    // Create a DateTime object for the given date and time
                    $givenDateTime = new \DateTime($dateString, $timezone);
            
                    // Get the current date and time in the same timezone
                    $currentDateTime = new \DateTime('now', $timezone);
            
                    // Debugging: Print the timestamps and timezones
                    error_log("Given DateTime: " . $givenDateTime->format('Y-m-d H:i:s') . " Timezone: " . $givenDateTime->getTimezone()->getName());
                    error_log("Current DateTime: " . $currentDateTime->format('Y-m-d H:i:s') . " Timezone: " . $currentDateTime->getTimezone()->getName());
            
                    // Calculate the difference between the current time and the given time
                    $interval = $givenDateTime->diff($currentDateTime); // Note the order here
            
                    // Extract days, hours, and minutes from the interval
                    $daysAgo = $interval->days;
                    $hoursAgo = $interval->h;
                    $minutesAgo = $interval->i;
            
                    $account['daysAgo'] = $daysAgo;
                    $account['hoursAgo'] = $hoursAgo;
                    $account['minutesAgo'] = $minutesAgo;
                }
            } else { // currently, no one uses it?
                echo "currently, no one uses it?";
                foreach ($latestData as &$room) { // Use reference to modify the original array
                    $roomInfo = $this->db->query('SELECT * FROM rooms WHERE room_id = :room_id', [
                        'room_id' => $room['room_id'],
                    ])->find();
    
                    // dd($roomInfo);
    
                    if (!empty($roomInfo)) {
                        $room = array_merge($room, $roomInfo); // Merge the first roomInfo into the room
                    }
    
                    $profInfo = $this->db->query('SELECT f_name, l_name FROM accounts WHERE school_id = :school_id', [
                        'school_id'=> $room['school_id'],
                    ])->find();
    
                    $profInfo['prof_name'] = $profInfo['f_name'] . ' ' . $profInfo['l_name'];
                    unset($profInfo['f_name']); unset($profInfo['l_name']);
                    if (!empty($profInfo)) {
                        $room = array_merge($room, $profInfo);
                    }
                }
                unset($room); // Unset reference to avoid accidental modifications later
            }

        // Fetching of Other Data Necessary: (Single Tables)
        } elseif (isset($table)) {         
            // if ($table ==  'rooms') {
            if ($table ==  'rooms' || $table == 'room_list') { // Mainly used by Dashboard Page

                if ($table == 'room_list' || $table == 'rooms') {    
                    foreach ($latestData as &$room) {
                        // Get info of Room
                        $roomInfo = $this->db->query('SELECT * FROM rooms WHERE room_id = :room_id', [
                            'room_id' => $room['room_id'],
                        ])->find();

                        if (!empty($roomInfo)) {
                            $room = array_merge($room, $roomInfo);
                        }
                        // dd($roomInfo);

                        // Get the Room's Professor Name
                        $profInfo = $this->db->query('SELECT f_name, l_name FROM accounts WHERE school_id = :school_id', [
                            'school_id'=> $roomInfo['school_id'],
                        ])->find();
        
                        $profInfo['prof_name'] = $profInfo['f_name'] . ' ' . $profInfo['l_name'];
            
                        unset($profInfo['f_name']); unset($profInfo['l_name']);
                        if (!empty($profInfo)) {
                            $room = array_merge($room, $profInfo);
                        }
                        // dd($room);
    
                    }
                } elseif (isset($currentPage) && $currentPage == 'admin_rooms') {
                    foreach ($latestData as $index => &$data) {
                        $profInfo = $this->db->query('SELECT f_name, l_name FROM accounts WHERE school_id = :school_id', [
                            'school_id'=> $data['school_id'],
                        ])->find();
        
                        $profInfo['prof_name'] = $profInfo['f_name'] . ' ' . $profInfo['l_name'];
            
                        unset($profInfo['f_name']); unset($profInfo['l_name']);
                        if (!empty($profInfo)) {
                            $data = array_merge($data, $profInfo);
                        }
                    }
                }
                unset($data);

            // Inside the getLatestData function, in the room_groups section
            } elseif ($table == 'room_groups') {
                // echo "UMPISA NG ROOM_GROUPS";
                // dd($conditions);
                if (!empty($latestData[0]['groups_json'])) {
                    $decodedGroups = json_decode($latestData[0]['groups_json'], true);
                    if (is_array($decodedGroups)) {
                        foreach ($decodedGroups as &$group) {
                            foreach($group as &$member){
                                $stu_info = $this->db->query('SELECT kanban FROM accounts WHERE school_id = :school_id', [
                                    'school_id' => $member[1],
                                ])->find();
                
                                if (!empty($stu_info['kanban'])) {
                                    $member[3] = json_decode($stu_info['kanban'], true);
                                } else {
                                    $member[3] = [
                                        $conditions['room_id'] => [
                                            'todo' => [],
                                            'wip' => [],
                                            'done' => []
                                        ]
                                    ];
                                }
                            }
                        }
                    }
                    
                    $encodedGroups = json_encode($decodedGroups);
                    $latestData[0]['groups_json'] = $encodedGroups;
                }
            } elseif (isset($currentPage) && $currentPage == 'admin_accounts') {
                $latestData['students'] = [];
                $latestData['instructors'] = [];
                $latestData['all'] = [];

                foreach ($latestData as $index => $data) {
                    // dd($data['account_type']);
                    if (($index !== 'student' && $index !== 'professor') && isset($data['account_type']) &&  $data['account_type'] == 'admin') {
                        unset($latestData[$index]);
                        continue;
                    } elseif (($index !== 'student' && $index !== 'professor') && isset($data['account_type']) &&  $data['account_type'] == 'student') {
                        $latestData['students'][] = $data;
                        $latestData['all'][] = $data;
                        unset($latestData[$index]);
                        continue;
                    } elseif (($index !== 'student' && $index !== 'professor') && isset($data['account_type']) &&  $data['account_type'] == 'professor') { 
                        $latestData['instructors'][] = $data;
                        $latestData['all'][] = $data;
                        unset($latestData[$index]);
                        continue;
                    }
                    
                    unset($data['password']);
                    unset($data['reset_token_hash']);
                    unset($data['reset_token_expires_at']);
                    unset($data['R']);
                    unset($data['I']);
                    unset($data['A']);
                    unset($data['S']);
                    unset($data['E']);
                    unset($data['C']);
                    unset($data['kanban']);
                }

                // dd($latestData);
            }
        }


        // Return valid JSON response
        header('Content-Type: application/json');
        echo json_encode(['data' => $latestData ?? []]);
        exit;
    } catch (\Exception $e) {
        // Log the error and return a 500 response
        error_log($e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'An error occurred while fetching data']);
        exit;
    }
}


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//             END OF LATEST DATA                //
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

//  ---------------------------------------------------------------------------------------------

// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
//              START OF  SUBMIT FORMS           //
// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
    private function submitForm($params)
    {
        $formData = $_POST;
        $formType = $params['form_type'] ?? 'default';

        // Log the received data
        error_log("Received {$formType} form data: " . print_r($formData, true));

        // Process the form data based on the form type
        switch ($formType) {
            case 'create_room':
                $result = $this->processCreateRoomForm($formData);
                break;
            case 'join_room':
                $result = $this->processJoinRoomForm($formData);
                break;
            case 'handle_request':
                $result = $this->processHandleRequest($formData);
                break;
            case 'kick_student':
                $result = $this->processKickStudent($formData);
                break;
            case 'group_students':
                $result = $this->processGroupStudents($formData);
                break;
            case 'update_kanban':
                $result = $this->processUpdateKanban($formData);
                break;
            default:
                $result = $this->processDefaultForm($formData);
        }

        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    //       START OF FUNCTIONS for SUBMIT FORMS      //

    private function processUpdateKanban($formData) {
        try {
            // Get current kanban data
            $currentKanban = $this->db->query('SELECT kanban FROM accounts WHERE school_id = :school_id', [
                'school_id' => $formData['school_id']
            ])->find();
    
            // dd($formData);
            // dd($currentKanban);

            // Decode current kanban or initialize empty structure
            $kanbanData = [];
            if (!empty($currentKanban['kanban'])) {
                $kanbanData = json_decode($currentKanban['kanban'], true) ?? [];
            }

            $kanbanData = $this->cleanupKanbanData($kanbanData);
    
            // Initialize room's kanban if it doesn't exist
            if (!isset($kanbanData[$formData['room_id']])) {
                $kanbanData[$formData['room_id']] = [
                    'todo' => [],
                    'wip' => [],
                    'done' => []
                ];
            }
    
            // Add task to appropriate list
            $task = json_decode($formData['task'], true);

            // Validate destination
            $validDestinations = ['todo', 'wip', 'done'];

            // For delete operations
            if (isset($formData['action']) && $formData['action'] === 'delete') {
                foreach ($validDestinations as $list) {
                    $kanbanData[$formData['room_id']][$list] = array_values(array_filter(
                        $kanbanData[$formData['room_id']][$list],
                        function($existingTask) use ($task) {
                            return $existingTask[0] !== $task[0];
                        }
                    ));
                }
                
                // Update database without adding the task back
                $success = $this->db->query('UPDATE accounts SET kanban = :kanban WHERE school_id = :school_id', [
                    'kanban' => json_encode($kanbanData),
                    'school_id' => $formData['school_id']
                ]);

                if (!$success) {
                    throw new \Exception('Failed to update database');
                }

                return [
                    'success' => true,
                    'message' => 'Task deleted successfully',
                    'data' => $kanbanData[$formData['room_id']]
                ];
            }

            if (!in_array($formData['destination'], $validDestinations)) {
                throw new \Exception('Invalid destination');
            }

            // For move operations
            if (isset($formData['action']) && $formData['action'] === 'move') {
                foreach ($validDestinations as $list) {
                    $kanbanData[$formData['room_id']][$list] = array_values(array_filter(
                        $kanbanData[$formData['room_id']][$list],
                        function($existingTask) use ($task) {
                            return $existingTask[0] !== $task[0];
                        }
                    ));
                }
            }

            // For move operations
            // if (isset($formData['action']) && $formData['action'] === 'move') {
            //     foreach (['todo', 'wip', 'done'] as $list) {
            //         $kanbanData[$formData['room_id']][$list] = array_values(array_filter(
            //             $kanbanData[$formData['room_id']][$list],
            //             function($existingTask) use ($task) {
            //                 return $existingTask[0] !== $task[0];
            //             }
            //         ));
            //     }
            // }

            // if (isset($formData['action']) && $formData['action'] === 'move') {
            //     // Remove task from all lists first
            //     foreach (['todo', 'wip', 'done'] as $list) {
            //         $kanbanData[$formData['room_id']][$list] = array_filter(
            //             $kanbanData[$formData['room_id']][$list],
            //             function($task) use ($formData) {
            //                 return $task[0] !== json_decode($formData['task'], true)[0];
            //             }
            //         );
            //     }
            // }

            // Add task to appropriate list
            $kanbanData[$formData['room_id']][$formData['destination']][] = $task;

            // dd($kanbanData);
    
            // Update database
            $success =$this->db->query('UPDATE accounts SET kanban = :kanban WHERE school_id = :school_id', [
                'kanban' => json_encode($kanbanData),
                'school_id' => $formData['school_id']
            ]);

            if (!$success) {
                throw new \Exception('Failed to update database');
            }
    
            return [
                'success' => true,
                'message' => 'Kanban updated successfully',
                'data' => $kanbanData[$formData['room_id']]
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error updating kanban: ' . $e->getMessage()
            ];
        }
    }

    private function cleanupKanbanData($kanbanData) {
        $validDestinations = ['todo', 'wip', 'done'];
        
        foreach ($kanbanData as $roomId => $roomData) {
            // Keep only valid destinations
            $cleanRoom = array_intersect_key($roomData, array_flip($validDestinations));
            
            // Ensure all valid destinations exist
            foreach ($validDestinations as $dest) {
                if (!isset($cleanRoom[$dest])) {
                    $cleanRoom[$dest] = [];
                }
            }
            
            $kanbanData[$roomId] = $cleanRoom;
        }
        
        return $kanbanData;
    }

    private function processHandleRequest($formData) {
        // dd($formData);
        // echo $formData['buttonName'];
        $values_array = explode(",", $formData['buttonValue']); // [0] = room_id, [1] = school_id
        
        if ($formData['buttonName'] == 'accept') {
            $roomExistence = $this->db->query('select * from rooms where room_id = :id', [
                'id' => $values_array[0]
            ])->find();
        
            $prof_info = $this->db->query('select * from accounts where school_id = :id', [
                'id' => $roomExistence['school_id']
            ])->find();
        
            $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];
        
            // NOTIFICATIONS
            $type = json_encode([
                "type" => "room_accept",
                "room_name" => $roomExistence['room_name'],
                "prof_name" => $roomExistence['prof_name'],
                "prof_id" => $this->currentUser,
                "room_id" => $roomExistence['room_id'],
                "student_id" => $values_array[1],
            ]);
        
            $this->db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
                'school_id' => $values_array[1], 
                'type' => $type,
            ]);
        
            // DELETE the room_join notification of the student
            $this->db->query('INSERT INTO room_list(school_id, room_id) VALUES (:student, :room) ', [
                'student'=>$values_array[1],
                'room'=>$values_array[0]
            ]);
        
            $this->db->query('delete from join_room_requests where room_id = :room_id and school_id = :school_id', [
                'room_id' => $values_array[0],
                'school_id' => $values_array[1]
            ]);
        } else if ($formData['buttonName'] == 'decline') {
            $roomExistence = $this->db->query('select * from rooms where room_id = :id', [
                'id' => $values_array[0]
            ])->find();
        
            $prof_info = $this->db->query('select l_name, f_name from accounts where school_id = :id', [
                'id' => $roomExistence['school_id']
            ])->find();
        
            $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];
        
            // NOTIFICATIONS
            $type = json_encode([
                "type" => "room_decline",
                "room_name" => $roomExistence['room_name'],
                "prof_name" => $roomExistence['prof_name'],
                "prof_id" => $this->currentUser,
                "room_id" => $roomExistence['room_id'],
                "student_id" => $values_array[0],
            ]);
        
            $this->db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
                'school_id' => $values_array[1],
                'type' => $type,
            ]);
        
            $this->db->query('delete from join_room_requests where room_id = :room_id and school_id = :school_id', [
                ':room_id' => $values_array[0],
                ':school_id' => $values_array[1]
            ]);
        }
    }

    private function processKickStudent($formData) {
        $values_array = explode(",", $formData['buttonValue']); // [0] = room_id, [1] = school_id

        // dd($formData);
        $roomExistence = $this->db->query('select * from rooms where room_id = :id', [
            'id' => $values_array[0],
        ])->find();
    
        $prof_info = $this->db->query('select l_name, f_name from accounts where school_id = :id', [
            'id' => $roomExistence['school_id']
        ])->find();
        
        $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];
    
        $this->db->query('delete from room_list where room_id = :room_id and school_id = :school_id', [
            ':room_id' => $values_array[0],
            ':school_id' => $values_array[1]
        ]);
    
        // NOTIFICATIONS
        $type = json_encode([
            "type" => "student_remove",
            "room_name" => $roomExistence['room_name'],
            "prof_name" => $roomExistence['prof_name'],
            "prof_id" => $this->currentUser,
            "room_id" => $roomExistence['room_id'],
            "student_id" => $values_array[1],
        ]);
    
        $this->db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
            'school_id' => $values_array[1], 
            'type' => $type,
        ]);

    }

    private function processGroupStudents($formData) {
        $decodedGroups = json_decode($_POST['genGroups'], true);

        $genGroups = json_encode($decodedGroups);

        $groupCheck = $this->db->query('select * from room_groups where room_id = :id', [   
            'id' => $formData['room'],
        ])->find();
    
        if (! empty($groupCheck)) {
            $this->db->query('DELETE FROM room_groups WHERE room_id = :id', [
                ':id'=> $formData['room'],
            ]);
        }
        
        $this->db->query('INSERT INTO room_groups(room_id, groups_json) VALUES (:id, :groups)', [
            ':id'=> $formData['room'],
            ':groups'=> $genGroups
        ]);
    }

    private function processCreateRoomForm($formData)
    {
        $formData['school_id'] = $this->currentUser;
        // Validate required fields
        $requiredFields = ['school_id', 'room_name', 'year_level', 'program', 'section'];
        foreach ($requiredFields as $field) {
            if (empty($formData[$field])) {
                return ['success' => false, 'message' => "Missing required field: {$field}"];
            }
        }

        // Check if the room name is more than 100 characters:
        $errors = [];

        if (! Validator::string($formData['room_name'], 1, 100)) {
            $errors['room_name'] = 'A room name of no more than 100 characters is required.';
        }
    
        if(! empty($errors)) {
            return view('rooms/dashboard.view.php', [
                'errors' => $errors,
                'room_info' => json_decode($formData['encoded_room_info'], true),
                'descending_rooms' => $formData['desc'],
                'ascending_rooms' => $formData['asc'],
            ]);
        }

        // Generate Random 6-digit code & check if it already exists within room_code column in rooms
        $i = 0;
        while ($i === 0) {
            $unique_number =  rand(100000, 999999);
            $checkCode = $this->db->query('select room_code from rooms where room_code = :u_num', [
                ':u_num' => $unique_number
            ])->find();

            if($checkCode !== false ){
                continue;
            } else {
                $room_code = (string) $unique_number;
                $i++;
            }
        }

        // dd($formData);

        $this->db->query('INSERT INTO rooms (school_id, room_name, room_code, year_level, program, section) VALUES (:school_id, :room_name, :room_code, :year_level, :program, :section)', [
            'school_id' => $formData['school_id'],
            'room_name' => $formData['room_name'],
            'room_code' => $room_code,
            'year_level' => $formData['year_level'],
            'program' => $formData['program'],
            'section' => $formData['section']
        ]);

        return ['success' => true, 'message' => 'Room created successfully', 'data' => $formData];
    }

    private function processJoinRoomForm($formData)
    {
        $code = filter_input(INPUT_POST, "room_code", FILTER_SANITIZE_NUMBER_INT);
        $errors = [];

        $roomExistence = $this->db->query('select * from rooms where room_code = :code', [
            ':code' => $code
        ])->find();

        if (! $roomExistence) {
            $errors['room_existence'] = "Input a Valid Room Code / Code doesn't match any rooms.";
            header("Location: /dashboard");
            die();
        } else {
            $alrSentReq = $this->db->query('select * from join_room_requests where school_id = :student and room_id = :room', [
                ':student'=>$this->currentUser,
                ':room' => $roomExistence['room_id']
            ])->find();

            if (empty($alrSentReq)) {
                $prof_info = $this->db->query('select l_name, f_name from accounts where school_id = :id', [
                    'id' => $roomExistence['school_id']
                ])->find();
        
                $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];
    
                $isAlrJoined = $this->db->query('select * from room_list where room_id  = :room and school_id = :student', [
                    ':student'=>$this->currentUser,
                    ':room' => $roomExistence['room_id']
                ])->find();
                
                if ($isAlrJoined) {
                    $errors['is_joined'] = 'You are already joined in this room!';
                } else {
                    $this->db->query('INSERT INTO join_room_requests(school_id, room_id) VALUES (:student, :room)', [
                        ':student'=>$this->currentUser,
                        ':room'=>$roomExistence['room_id']
                    ]);
    
                    $type = json_encode([
                        "type" => "room_join",
                        "room_name" => $roomExistence['room_name'],
                        "prof_name" => $roomExistence['prof_name'],
                        "prof_id" => $roomExistence['school_id'],
                        "room_id" => $roomExistence['room_id'],
                        "student_id" => $this->currentUser,
                        "student_name" => "{$_SESSION['user']['l_name']}, {$_SESSION['user']['f_name']}"
                    ]);
                    
                    // NOTIFICATIONS
                    $this->db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
                        'school_id' => $roomExistence['school_id'], 
                        'type' => $type,
                    ]);
                }
    
                // if(! empty($errors)) {
                //     header("Location: /dashboard");
                //     die();
                // }
    
    
                // header("Location: /dashboard");
                // die();
            }
        }

        header('Content-Type: application/json');
        return ['success' => true, 'message' => 'Joined room successfully', 'data' => $formData];
    }

    private function processDefaultForm($formData)
    {
        // Handle any generic form submission
        return ['success' => true, 'message' => 'Form submitted successfully', 'data' => $formData];
    }

    // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    //             END OF SUBMIT FORMS              //
    // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

    private function getMoreContent($params)
    {
        $page = $_GET['page'] ?? 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $content = $this->db->query("SELECT * FROM your_table LIMIT ? OFFSET ?", [$limit, $offset])->fetchAll();
        return json_encode(['content' => $content]);
    }

    private function toggleLike($params)
    {
        $itemId = $params['id'] ?? null;
        if (!$itemId) {
            return json_encode(['error' => 'Item ID is required']);
        }
        // Toggle like status
        // For example:
        // $this->db->query("UPDATE your_table SET likes = likes + 1 WHERE id = ?", [$itemId]);
        return json_encode(['success' => true, 'liked' => true]);
    }

    private function notFound()
    {
        http_response_code(404);
        return json_encode(['error' => 'Not Found']);
    }
}
