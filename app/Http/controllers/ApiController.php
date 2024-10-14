<?php

namespace App\Controllers;
use Model\Database;
use Model\App;

class ApiController
{
    private $db;
    private $currentUser;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
        $this->currentUser = $_SESSION['user']['school_id'] ?? null;
    }

    public function handleGet($action, $params = [])
    {
        switch ($action) {
            case 'search':
                return $this->search($params);
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
        $searchTerm = $_POST['search_input'] ?? '';
        $encodedRoomInfo = $_POST['encoded_room_info'] ?? '';
        
        // Perform your search logic here
        $results = $this->db->query("SELECT room_id, room_name FROM rooms WHERE room_name LIKE ?", ["%$searchTerm%"])->fetchAll();

        header('Content-Type: application/json');
        echo json_encode($results);
        // echo "Searching for: $searchTerm";
        // exit;
    }

    private function getLatestData($params)
    {
        $latestData = $this->db->query("SELECT * FROM your_table ORDER BY created_at DESC LIMIT 10")->fetchAll();
        return json_encode(['data' => $latestData]);
    }

    private function getMoreContent($params)
    {
        $page = $_GET['page'] ?? 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $content = $this->db->query("SELECT * FROM your_table LIMIT ? OFFSET ?", [$limit, $offset])->fetchAll();
        return json_encode(['content' => $content]);
    }

    private function submitForm($params)
    {
        $formData = $_POST;
        // Process the form data
        // For example:
        // $this->db->query("INSERT INTO your_table (column1, column2) VALUES (?, ?)", [$formData['field1'], $formData['field2']]);
        return json_encode(['success' => true, 'message' => 'Form submitted successfully']);
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