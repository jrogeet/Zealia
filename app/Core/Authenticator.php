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

    public function attempt($school_id, $password)
    {
        $user = $this->db
            ->query('SELECT * FROM accounts WHERE school_id = :school_id', [
                ':school_id' => $school_id
            ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user["account_activation_hash"] === NULL) {
                    $this->login($user); // Assuming login() handles session securely

                    if ($_SESSION['user']['account_type'] === 'admin') {
                        return 0;
                    }

                    return 1;
                } else {
                    return -2;
                }
            } else {
                return -1;
            }
        } else {
            return -1;
        }
    }

    public function register($school_id, $email)
    {
        $user = $this->db
        ->query('select * from accounts where school_id = :school_id or email = :email', [
            ':school_id' => $school_id,
            ':email'=> $email,
        ])->find();

        if ($user) {
            return 0;
        } else {
            return 1;
        }

    }

    public function login($user) {
        $_SESSION['user'] = [
            'school_id'=> $user['school_id'],
            'email'=> $user['email'],
            // 'password' => $user['password'],
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