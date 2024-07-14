<?php
namespace Core;

use Model\App;
use Model\Database;


class Authenticator
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    // Login & Register Attempt
    // l = Login 
    // r = Register
    public function attempt($school_id, $password, $attempt_type, $email = '')
    {
        // Login
        if ($attempt_type == 'l'){
            // Find user in the Database
            $user = $this->db
            ->query('SELECT * FROM accounts WHERE school_id = :school_id', [
                ':school_id' => $school_id
            ])->find();

            // If user exists:
            if ($user) {
                if (password_verify($password, $user['password'])) {   // If password matches:
                    if ($user["account_activation_hash"] === NULL) {  // If user activated their email:
                        $this->login($user); // Assuming login() handles session securely

                        if ($_SESSION['user']['account_type'] === 'admin') { 
                            return 0; // Redirect to Admin Page
                        }

                        return 1; // Redirect to User's Dashboard
                    } else {
                        return -2; // Email not activated Error
                    }
                } else {
                    return -1; // Failed Login: (Password didn't match)
                }
            } else {
                return -1; // Failed Login: (User doesn't exist)
            }
        // Register
        } else if ($attempt_type == 'r'){
            // Check if user already exists
            $user = $this->db
            ->query('select * from accounts where school_id = :school_id or email = :email', [
                ':school_id' => $school_id,
                ':email'=> $email,
            ])->find();

            if ($user) {
                return 0; // Show Error: (School ID or Email already used)
            } else {
                return 1; // Register to database and Send Email for activation
            }
        }

    }

    public function register($school_id, $email, $password, $lname, $fname)
    {
        // generate random string of bytes in hex digits
        // for email activation or confirmation
        $activation_token = bin2hex(random_bytes(16));
        $activation_token_hash = hash("sha256", $activation_token);

        // identify user type (student or professor)
        $email_parts = explode('@', $email);
        $domain = array_pop($email_parts);
        if ($domain === 'student.fatima.edu.ph') {
            $usertype = 'student';
        } elseif ($domain === 'fatima.edu.ph') {
            $usertype = 'professor';
        }

        // Insert data to Database
        $this->db->query("INSERT INTO accounts(school_id, email, password, l_name, f_name, account_type, account_activation_hash)
        VALUES(:school_id, :email, :password, :l_name, :f_name, :account_type, :activation_token_hash)", [
            ':school_id'=> $school_id,
            ':email'=> $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
            ':l_name'=> $lname,
            ':f_name'=> $fname,
            ':account_type'=> $usertype,
            ':activation_token_hash' => $activation_token_hash
        ]);

        return $activation_token;
    }

    public function login($user) {
        // These are accessible within the website upon login
        $_SESSION['user'] = [
            'school_id'=> $user['school_id'],
            'email'=> $user['email'],
            'l_name'=> $user['l_name'],
            'f_name'=> $user['f_name'],
            'account_type'=> $user['account_type'],
        ];
        session_regenerate_id(true); // regenerate new SESSION ID and (true) to clear out the OLD session file
    }
    
    public function logout() {
        Session::destroy();
    }
}