<?php
namespace Core;

use Model\App;
use Model\Database;
use Model\Logger;


// Authenticate Login & Registration of User
class Authenticator
{
    protected $db;
    protected $logger;
    public function __construct()
    {
        $this->db = App::resolve(Database::class);
        // $this->logger = App::resolve(Logger::class);
        $this->logger = new Logger($this->db);
    }

    // Login & Register Attempt
    // l = Login 
    // r = Register
    public function attempt($school_id, $password, $attempt_type, $email = '', $name = null)
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
                        $this->login($user); // Login the user

                        if ($_SESSION['user']['account_type'] === 'admin') { 
                            return 0; // 0 = Redirect to Admin Page
                        }

                        return 1; // 1 = Redirect to User's Dashboard
                    } else {
                        // Email not activated Error

                        $this->logger->log(
                            'LOGIN',
                            'failed',
                            'user',
                            $school_id,
                            [
                                'errors' => [
                                    'email'=> "Email not activated"
                                ]
                            ]
                        );

                        return -2; // -2 = Email not activated Error
                    }
                } else {
                    // Failed Login (Password didn't match)

                    $this->logger->log(
                        'LOGIN',
                        'failed',
                        'user',
                        $school_id,
                        [
                            'errors' => [
                                'password'=> "Password is not correct"
                            ]
                        ]
                    );

                    return -1; // -1 = Failed Login (Password didn't match)
                }
            } else {
                // Failed Login (User doesn't exist)
                
                $this->logger->log(
                    'LOGIN',
                    'failed',
                    'user',
                    $school_id,
                    [
                        'errors' => [
                            'id'=> "Account ID doesn't exist"
                        ]
                    ]
                );
                return -1; // -1 = Failed Login (User doesn't exist)
            }
        // Register
        } elseif ($attempt_type == 'r'){
            // Check if user already exists
            $user = $this->db
            ->query('select * from accounts where school_id = :school_id or email = :email', [
                ':school_id' => $school_id,
                ':email'=> $email,
            ])->find();

            if ($user) {
                // Failed Register: (School ID or Email already used)

                // identify user type (student or instructor)
                $email_parts = explode('@', $email);
                $domain = array_pop($email_parts);
                if ($domain === 'student.fatima.edu.ph') {
                    $usertype = 'student';
                } elseif ($domain === 'fatima.edu.ph') {
                    $usertype = 'instructor';
                }

                $this->logger->log(
                    'REGISTER',
                    'failed',
                    'user',
                    $school_id,
                    [
                        'school_id' => $school_id, 
                        'email' => $email,
                        'name' => $name,
                        'account_type' => $usertype,
                        'errors' => [
                            'exist'=> 'School ID or Email already used'
                        ]
                    ]
                );

                return 0; // Show Error: (School ID or Email already used)
            } else {
                // SUCCESSFUL REGISTRATION:

                // added to logs in register() function below
                
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

        // identify user type (student or instructor)
        $email_parts = explode('@', $email);
        $domain = array_pop($email_parts);
        if ($domain === 'student.fatima.edu.ph') {
            $usertype = 'student';
        } elseif ($domain === 'fatima.edu.ph') {
            $usertype = 'instructor';
        }

        $this->logger->log(
            'REGISTER',
            'success',
            'user',
            $school_id,
            [
                'school_id' => $school_id, 
                'email' => $email,
                'f_name' => $fname,
                'l_name' => $lname,
                'account_type' => $usertype
            ]
        );

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
        $this->logger->log(
            'LOGIN',
            'success',
            'user',
            $user['school_id']
        );

        // These are accessible within the website upon login
        $_SESSION['user'] = [
            'school_id'=> $user['school_id'],
            'email'=> $user['email'],
            'l_name'=> $user['l_name'],
            'f_name'=> $user['f_name'],
            'account_type'=> $user['account_type'],
            'result' => $user['result'],
        ];

        $_SESSION['page-settings'] = [
            'dark_mode' => false,
            'admin_nav_toggle' => false 
        ];

        session_regenerate_id(true); // regenerate new SESSION ID and (true) to clear out the OLD session file
    }
    
    public function logout() {
        $this->logger->log(
            'LOGOUT',
            'success',
            'user',
            $_SESSION['user']['school_id']
        );

        Session::destroy();
    }
}