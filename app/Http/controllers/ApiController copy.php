<?php
// AFTER SUBMIT FORM and before GET LATEST DATA
// namespace App\Http\Controllers;
// use Model\Database;
// use Model\App;
// use Core\Validator;

// class ApiController
// {
//     private $db;
//     private $currentUser;

//     public function __construct()
//     {
//         // session_start();
//         $this->db = App::resolve(Database::class);
//         $this->currentUser = $_SESSION['user']['school_id'] ?? null;
//         session_write_close();
//     }

//     public function handleGet($action, $params = [])
//     {
//         switch ($action) {
//             case 'search':
//                 return $this->search($params);
//             case 'getLatestData':
//                 return $this->getLatestData($params);
//             case 'getMoreContent':
//                 return $this->getMoreContent($params);
//             default:
//                 return $this->notFound();
//         }
//     }

//     public function handlePost($action, $params = [])
//     {
//         switch ($action) {
//             case 'submitForm':
//                 return $this->submitForm($params);
//             case 'toggleLike':
//                 return $this->toggleLike($params);
//             default:
//                 return $this->notFound();
//         }
//     }

//     public function search($params)
//     {
//         $searchTerm = $_POST['search_input'] ?? '';
//         $encodedRoomInfo = $_POST['encoded_room_info'] ?? '';
        
//         // Perform your search logic here
//         $results = $this->db->query("SELECT room_id, room_name FROM rooms WHERE room_name LIKE ?", ["%$searchTerm%"])->fetchAll();

//         header('Content-Type: application/json');
//         echo json_encode($results);
//         // echo "Searching for: $searchTerm";
//         // exit;
//     }

//     private function getLatestData($params)
//     {
//         $table = $params['table'] ?? 'rooms';
//         $limit = $params['limit'] ?? 10;
//         $orderBy = $params['order_by'] ?? 'created_at';
//         $direction = $params['direction'] ?? 'DESC';
//         $conditions = $params['conditions'] ?? [];

//         $query = "SELECT * FROM {$table} ";

//         if (!empty($conditions)) {
//             $query .= "WHERE " . implode(' AND ', array_map(function($key, $value) {
//                 return "{$key} = :{$key}";
//             }, array_keys($conditions), $conditions));
//         }

//         $query .= "ORDER BY {$orderBy} {$direction} LIMIT {$limit}";

//         $latestData = $this->db->query($query, $conditions)->fetchAll();
//         return json_encode(['data' => $latestData]);
//     }

//     private function getMoreContent($params)
//     {
//         $page = $_GET['page'] ?? 1;
//         $limit = 10;
//         $offset = ($page - 1) * $limit;
//         $content = $this->db->query("SELECT * FROM your_table LIMIT ? OFFSET ?", [$limit, $offset])->fetchAll();
//         return json_encode(['content' => $content]);
//     }

//     // private function submitForm($params)
//     // {
//     //     $formData = $_POST;


//     //     // Log the received data
//     //     error_log('Received form data: ' . print_r($formData, true));

//     //     // Process the form data
//     //     // For example:
//     //     // $this->db->query("INSERT INTO rooms (room_name, year_level, program, section) VALUES (?, ?, ?, ?)", 
//     //     //     [$formData['room_name'], $formData['year_level'], $formData['program'], $formData['section']]);

//     //     header('Content-Type: application/json');
//     //     // dd($formData);
//     //     echo json_encode(['success' => true, 'message' => 'Form submitted successfully', 'data' => $formData]);
//     //     exit;
//     // }


// // SUBMITING FORMS:
//     private function submitForm($params)
//     {
//         $formData = $_POST;
//         $formType = $params['form_type'] ?? 'default';

//         // Log the received data
//         error_log("Received {$formType} form data: " . print_r($formData, true));

//         // Process the form data based on the form type
//         switch ($formType) {
//             case 'create_room':
//                 $result = $this->processCreateRoomForm($formData);
//                 break;
//             case 'join_room':
//                 $result = $this->processJoinRoomForm($formData);
//                 break;
//             // Add more case statements for other form types
//             default:
//                 $result = $this->processDefaultForm($formData);
//         }

//         header('Content-Type: application/json');
//         echo json_encode($result);
//         exit;
//     }

//     private function processCreateRoomForm($formData)
//     {
//         $formData['school_id'] = $this->currentUser;
//         // Validate required fields
//         $requiredFields = ['school_id', 'room_name', 'year_level', 'program', 'section'];
//         foreach ($requiredFields as $field) {
//             if (empty($formData[$field])) {
//                 return ['success' => false, 'message' => "Missing required field: {$field}"];
//             }
//         }

//         // Check if the room name is more than 100 characters:
//         $errors = [];

//         if (! Validator::string($formData['room_name'], 1, 100)) {
//             $errors['room_name'] = 'A room name of no more than 100 characters is required.';
//         }
    
//         if(! empty($errors)) {
//             return view('rooms/dashboard.view.php', [
//                 'errors' => $errors,
//                 'room_info' => json_decode($formData['encoded_room_info'], true),
//                 'descending_rooms' => $formData['desc'],
//                 'ascending_rooms' => $formData['asc'],
//             ]);
//         }

//         // Generate Random 6-digit code & check if it already exists within room_code column in rooms
//         $i = 0;
//         while ($i === 0) {
//             $unique_number =  rand(100000, 999999);
//             $checkCode = $this->db->query('select room_code from rooms where room_code = :u_num', [
//                 ':u_num' => $unique_number
//             ])->find();

//             if($checkCode !== false ){
//                 continue;
//             } else {
//                 $room_code = (string) $unique_number;
//                 $i++;
//             }
//         }

//         // dd($formData);

//         $this->db->query('INSERT INTO rooms (school_id, room_name, room_code, year_level, program, section) VALUES (:school_id, :room_name, :room_code, :year_level, :program, :section)', [
//             'school_id' => $formData['school_id'],
//             'room_name' => $formData['room_name'],
//             'room_code' => $room_code,
//             'year_level' => $formData['year_level'],
//             'program' => $formData['program'],
//             'section' => $formData['section']
//         ]);

//         return ['success' => true, 'message' => 'Room created successfully', 'data' => $formData];
//     }

//     private function processJoinRoomForm($formData)
//     {
//         // Implement join room logic
//         // ...

//         return ['success' => true, 'message' => 'Joined room successfully', 'data' => $formData];
//     }

//     private function processDefaultForm($formData)
//     {
//         // Handle any generic form submission
//         return ['success' => true, 'message' => 'Form submitted successfully', 'data' => $formData];
//     }

    

//     private function toggleLike($params)
//     {
//         $itemId = $params['id'] ?? null;
//         if (!$itemId) {
//             return json_encode(['error' => 'Item ID is required']);
//         }
//         // Toggle like status
//         // For example:
//         // $this->db->query("UPDATE your_table SET likes = likes + 1 WHERE id = ?", [$itemId]);
//         return json_encode(['success' => true, 'liked' => true]);
//     }

//     private function notFound()
//     {
//         http_response_code(404);
//         return json_encode(['error' => 'Not Found']);
//     }
// }