<?php 

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    
    $accounts = $db->query("select * from accounts where account_type != 'admin'", [
        ])->findAll();

    $students = [];
    $instructors = [];
    foreach ($accounts as $account) {
        if ($account['account_type'] === "student") {
            $students[] = $account;
        } elseif ($account['account_type'] === "instructor") {
            $instructors[] = $account;
        }
    }

    $encoded_accounts = json_encode($accounts);
    $encoded_students = json_encode($students);
    $encoded_instructors = json_encode($instructors);
    
    view('admin/accounts/admin-accounts.view.php', [
        'accounts' => $accounts,
        'students' => $students,
        'instructors' => $instructors,
        'encoded_accounts' => $encoded_accounts,
        'encoded_students' => $encoded_students,
        'encoded_instructors' => $encoded_instructors,
    ]);

} else {
    abort(403);
}