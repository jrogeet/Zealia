<?php 

use Core\Session;
use Model\Database;
use Model\App;
use Model\Logger;

$db = App::resolve(Database::class);
$config = App::resolve('config');

$logger = new Logger($db);

// Handle POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'] ?? '';
    $f_name = $_POST['f_name'] ?? '';
    $l_name = $_POST['l_name'] ?? '';
    $school_id = $_POST['school_id'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Check if all required fields are present
    if (!$category || !$f_name || !$l_name || !$school_id || !$email || !$message) {
        $_SESSION['status'] = 'missing';
        header('Location: /submit-ticket');
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = 'xmail';
        header('Location: /submit-ticket');
        exit;
    }

    try {
        $result = $db->query('INSERT INTO ticket (category, f_name, l_name, school_id, email, message) 
        VALUES(:category, :f_name, :l_name, :school_id, :email, :message)', [
            'category' => $category,
            'f_name' => $f_name,
            'l_name' => $l_name,
            'school_id' => $school_id,
            'email' => $email,
            'message' => $message
        ]);

        if (!$result) {
            throw new Exception("Failed to insert data.");
        }

        $logger = new Logger($db);
        $logger->log(
            'SUBMIT TICKET',
            'success',
            'ticket',
            $school_id,
        );

        $_SESSION['status'] = 'sent';
        header('Location: /submit-ticket');
        exit;

    } catch (Exception $e) {
        error_log($e->getMessage());
        $_SESSION['status'] = 'error';
        header('Location: /submit-ticket');
        exit;
    }
}

// Handle GET request (display form)
$status = $_SESSION['status'] ?? null;
unset($_SESSION['status']); // Clear the status after getting it

view("admin/submit-ticket.view.php", [
    'status' => $status
]);





