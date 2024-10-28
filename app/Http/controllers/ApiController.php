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
        if (isset($params['table1']) && !(isset($params['table']))) {
            foreach ($params as $key =>  $value) {
                if (str_contains($key, 'table')) {
                    $mulTables[$key] =  $value;
                    unset($params[$key]);
                }
            }
        } else {
            $table = $params['table'] ?? 'rooms';
            unset($params['table']);
        }

        // dd($mulTables);

        if (isset($params['currentPage'])) {
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
        $orderBy = $params['order_by'] ?? '';
        $direction = $params['direction'] ?? '';

        foreach ($params as $key => $value) {
            $conditions[$key] = $value;
        }

        // TABLES
        // dd($conditions);

        if (!empty($mulTables)) { // Multiple Tables
            $latestData = [];
            foreach ($mulTables as $tableKey => $tableName) {
                $query = "SELECT * FROM {$tableName} ";
                if (!empty($conditions)) {
                    $query .= " WHERE " . implode(' AND ', array_map(function($key) {
                        return "{$key} = :{$key}"; // Correctly use the key for the placeholder
                    }, array_keys($conditions)));
                }
                // THIS ERRORS IN STUDENT DASHBOARD
                if ($orderBy !== '' || $direction !== '') {
                    $query .= " ORDER BY {$orderBy} {$direction}";
                }
                
                // echo $query;
                // Execute the query
                $latestData[$tableName] = $this->db->query($query, $conditions)->findAll();
            }
        } else {
            $query = "SELECT * FROM {$table} ";
            if (!empty($conditions)) {
                $query .= " WHERE " . implode(' AND ', array_map(function($key) {
                    return "{$key} = :{$key}"; // Correctly use the key for the placeholder
                }, array_keys($conditions)));
            }
            // THIS ERRORS IN STUDENT DASHBOARD
            if ($orderBy !== '' || $direction !== '') {
                $query .= " ORDER BY {$orderBy} {$direction}";
            }
            
            // echo $query;
            $latestData = $this->db->query($query, $conditions)->findAll();
        }

        if (!empty($mulTables) && in_array('room_list', $mulTables)) {

            if (isset($currentPage) && $currentPage == "room") {
                if (! empty($latestData['room_list'])) {
                    foreach ($latestData['room_list'] as &$student) {
                        $stu_info = $this->db->query('SELECT f_name, l_name, school_id, email, result FROM accounts WHERE school_id = :school_id', [
                            'school_id' => $student['school_id']
                        ])->find();
                        // dd($stu_info);
                        if (!empty($stu_info)) {
                            $student = array_merge($student, $stu_info);
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
            } else {
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

        } elseif (isset($table)) {
            if ($table ==  'rooms' || $table == 'room_list') {
                foreach ($latestData as &$room) {
                    $profInfo = $this->db->query('SELECT f_name, l_name FROM accounts WHERE school_id = :school_id', [
                        'school_id'=> $room['school_id'],
                    ])->find();
    
                    $profInfo['prof_name'] = $profInfo['f_name'] . ' ' . $profInfo['l_name'];
                    unset($profInfo['f_name']); unset($profInfo['l_name']);
                    if (!empty($profInfo)) {
                        $room = array_merge($room, $profInfo);
                    }
    
                    if ($table == 'room_list') {
                        $roomInfo = $this->db->query('SELECT * FROM rooms WHERE room_id = :room_id', [
                            'room_id' => $room['room_id'],
                        ])->find();
    
                        if (!empty($roomInfo)) {
                            $room = array_merge($room, $roomInfo);
                        }
                    }
                }
                unset($room);
            } elseif ($table == 'room_groups') { // roomHasGroup & decodedGroups
                if (!empty($latestData[0]['groups_json'])) {
                    $decodedGroups = json_decode($latestData[0]['groups_json'], true);
                    foreach ($decodedGroups as &$group) {
                        foreach($group as &$member){
                            $stu_info = $this->db->query('SELECT kanban FROM accounts WHERE school_id = :school_id', [
                                'school_id' => $member[1],
                            ])->find();
    
                            if (isset($stu_info['kanban'])) {
                                $member[] = json_decode($stu_info['kanban'], true);
                            } else {
                                $member[] = "";
                            }
    
                            // foreach ($stu_info as $student) {
                            //     if(isset($member[1]) && $member[1] === $student['school_id']) {
                            //         if (isset($student['kanban'])) {
                            //             $member[] = json_decode($student['kanban'], true);
                            //         } else {
                            //             $member[] = "";
                            //         }
                            //     }
                            // }
                        }
                    }
                    // dd($decodedGroups);
                    $encodedGroups = json_encode($decodedGroups);
                    $latestData[0]['groups_json'] = $encodedGroups;
                }
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
            default:
                $result = $this->processDefaultForm($formData);
        }

        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    //       START OF FUNCTIONS for SUBMIT FORMS      //

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
