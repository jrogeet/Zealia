<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$rCount = $_GET['r'];
$iCount = $_GET['i'];
$aCount = $_GET['a'];
$sCount = $_GET['s'];
$eCount = $_GET['e'];
$cCount = $_GET['c'];
$finalRes = $_GET['finalRes'];

view("account/test-result.view.php", [
    'currentUser' => $currentUser,
    'rCount' => $rCount,
    'iCount' => $iCount,
    'aCount' => $aCount,
    'sCount' => $sCount,
    'eCount' => $eCount,
    'cCount' => $cCount,
    'finalRes' => $finalRes,
]);

