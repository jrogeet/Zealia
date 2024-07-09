<?php

use Model\App;
use Model\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$category = $_POST['category'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$school_id = $_POST['school_id'];
$year_section = $_POST['year_section'];
$email = $_POST['email'];
$message = $_POST['message'];

if (isset($_POST['category'], $_POST['f_name'], $_POST['l_name'], $_POST['school_id'], $_POST['year_section'], $_POST['email'], $_POST['message'])) {
    // Basic validation example
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        try {
            $result = $db->query('INSERT INTO ticket (category, f_name, l_name, school_id, year_section, email, message) 
            VALUES(:category, :f_name, :l_name, :school_id, :year_section, :email, :message)', [
                'category' => $_POST['category'],
                'f_name' => $_POST['f_name'],
                'l_name' => $_POST['l_name'],
                'school_id' => $_POST['school_id'],
                'year_section' => $_POST['year_section'],
                'email' => $_POST['email'],
                'message' => $_POST['message']
            ]);

            if (!$result) {
                throw new Exception("Failed to insert data.");
            }

            return view('admin/submit-ticket.view.php', [
                'success' => 'Ticket sent successfully.'
            ]);
        } catch (Exception $e) {
            // Handle error appropriately
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid email format.";
    }
} else {
    echo "Required fields are missing.";
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




