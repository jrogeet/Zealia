<?php

use Model\App;
use Model\Database;
use Model\Logger;

$db = App::resolve(Database::class);
$logger = new Logger($db);

header('Content-Type: application/json');

if (!isset($_POST['category'], $_POST['f_name'], $_POST['l_name'], $_POST['school_id'], $_POST['email'], $_POST['message'])) {
    echo json_encode([
        'success' => false,
        'error' => 'missing'
    ]);
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false,
        'error' => 'xmail'
    ]);
    exit;
}

try {
    $result = $db->query('INSERT INTO ticket (category, f_name, l_name, school_id, email, message) 
    VALUES(:category, :f_name, :l_name, :school_id, :email, :message)', [
        'category' => $_POST['category'],
        'f_name' => $_POST['f_name'],
        'l_name' => $_POST['l_name'],
        'school_id' => $_POST['school_id'],
        'email' => $_POST['email'],
        'message' => $_POST['message']
    ]);

    if (!$result) {
        throw new Exception("Failed to insert data.");
    }

    $logger->log(
        'SUBMIT TICKET',
        'success',
        'ticket',
        $_POST['school_id']
    );

    echo json_encode([
        'success' => true
    ]);
    
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => 'server',
        'message' => 'An error occurred while processing your request.'
    ]);
}



// $db->query('INSERT INTO ticket (category, f_name, l_name, school_id, year_section, email, message) 
// VALUES(:category, :f_name, :l_name, :school_id, :year_section, :email, :message)', [
//     'category' => $category,
//     'f_name' => $f_name,
//     'l_name' => $l_name,
//     'school_id' => $school_id,
//     'year_section' => $year_section,
//     'email' => $email,
//     'message' => $message
// ]);




