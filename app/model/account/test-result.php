<?php

use Model\App;
use Model\Database;
use Model\Logger;
use Core\Validator;

$db = App::resolve(Database::class);
$logger = new Logger($db);

$currentUser = $_SESSION['user']['school_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $rCount = $_POST["rCount"];
    $iCount = $_POST["iCount"];
    $aCount = $_POST["aCount"];
    $sCount = $_POST["sCount"];
    $eCount = $_POST["eCount"];
    $cCount = $_POST["cCount"];
    $finalRes = $_POST["finalRes"];
    $id = $_POST["id"];

    try {

        $result = $db->query('SELECT result FROM accounts WHERE school_id = :id', [
            'id' => $currentUser
        ])->find();

        $db->query('UPDATE accounts SET R = :rCount, I = :iCount, A = :aCount, S = :sCount, E = :eCount, C = :cCount, result = :finalRes WHERE school_id = :id', [
            ':rCount' => $rCount,
            ':iCount' => $iCount,
            ':aCount' => $aCount,
            ':sCount' => $sCount,
            ':eCount' => $eCount,
            ':cCount' => $cCount,
            ':finalRes' => $finalRes,
            ':id' => $id
        ]);

        if (isset($result['result'])) {
            $logger->log(
                'TEST RE-TAKE',
                'success',
                'user',
                $currentUser,
                [
                    'r' => $rCount,
                    'i' => $iCount,
                    'a' => $aCount,
                    's' => $sCount,
                    'e' => $eCount,
                    'c' => $cCount,
                    'result' => $finalRes,
                ]
            );
        } else {
            $logger->log(
                'TEST TAKE',
                'success',
                'user',
                $currentUser,
                [
                    'r' => $rCount,
                    'i' => $iCount,
                    'a' => $aCount,
                    's' => $sCount,
                    'e' => $eCount,
                    'c' => $cCount,
                    'result' => $finalRes,
                ]
            );
        }

        header("Location: /account");

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }

} else {
    header("Location: /dashboard");
}
