<?php

namespace App\Http\Controllers;

use Model\Database;
use Model\App;

// use App\Core\Controller;

// class ApiController extends Controller
class ApiController
{
    private $db;
    private $currentUser;

    public function __construct() {
        $this->db = App::resolve(Database::class);
        $this->currentUser = $_SESSION['user']['school_id'];
    }
    // Handle GET requests
    public function getData($type) 
    {
        // Example: You can handle different types of data
        switch ($type) {
            case 'rooms':
                $data = $this->getRooms();
                break;
            case 'students':
                // $data = $this->getStudents();
                break;
            // Add other cases for more data types
            default:
                $data = ['error' => 'Invalid data type'];
        }

        echo json_encode($data);
    }

    public function postData($type)
    {
        if ($type === 'search') {
            return $this->searchRooms();
        }
        // Handle other types of POST requests here
    }

    private function searchRooms()
    {
        $search = $_POST['search'] ?? '';
        $rooms = $this->getRooms();
        $match = [];

        if (strlen($search) > 0) {
            foreach ($rooms as $room) {
                $formArr = strtolower(substr($room['room_name'], 0, strlen($search)));
                if (strtolower($search) == $formArr) {
                    array_push($match, $room);
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode($match);
    }

    private function getRooms() {
        $room_info = [];

        if ($_SESSION['user']['account_type'] === 'professor') {
            $profRooms = $this->db->query('select * from rooms where school_id = :id', [
                ':id' => $this->currentUser
            ])->findAll();

            foreach ($profRooms as $room) {
                $room_info[] = $this->db->query('select * from rooms where room_id = :room_id', [
                    ':room_id' => $room['room_id'],
                ])->find();
            }
        } elseif ($_SESSION['user']['account_type'] === 'student') {
            $stuRooms = $this->db->query('select * from room_list where school_id = :id', [
                ':id' => $this->currentUser
            ])->findAll();

            foreach ($stuRooms as $room) {
                $room_info[] = $this->db->query('select * from rooms where room_id = :room_id', [
                    ':room_id' => $room['room_id'],
                ])->find();
            }
        }

        return $room_info;
    }
}
