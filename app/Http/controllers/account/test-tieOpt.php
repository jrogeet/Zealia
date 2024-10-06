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
$tempRes = $_GET['tempRes'];
$option = $_GET['option'];

$data = array(
    'id' => $currentUser,
    'rCount' => $rCount,
    'iCount' => $iCount,
    'aCount' => $aCount,
    'sCount' => $sCount,
    'eCount' => $eCount,
    'cCount' => $cCount,
    'tempRes' => $tempRes

);



$button = "";

$have = strlen($tempRes);
$need = 3-$have;


for ($x = 0; $x < strlen($option) ; $x++ ){
    
    $class = substr($option,$x,1);
    $name = $class;
    if( $name == 'R'){
        $name = 'Realistic';
    }elseif ( $name == 'I'){
        $name = 'Investigative';

    }elseif ( $name == 'A'){
        $name = 'Artistic';
        
    }elseif ( $name == 'S'){
        $name = 'Social';
        
    }elseif ( $name == 'E'){
        $name = 'Enterprising';
        
    }elseif ( $name == 'C'){
        $name = 'Conventional';
        
    }
    $button = $button . "<button class='$class' onclick='select(`$class`,$need)'>$name</button>";

}


view("account/tieOpt.view.php", [
    'heading' =>'My Account',
    'notifications' => $notifications,
    'currentUser' => $currentUser,
    'rCount' => $rCount,
    'iCount' => $iCount,
    'aCount' => $aCount,
    'sCount' => $sCount,
    'eCount' => $eCount,
    'cCount' => $cCount,
    'tempRes' => $tempRes,
    'option' => $option,
    'button' => $button,
    'have' => $have,
    'need' => $need
]);

