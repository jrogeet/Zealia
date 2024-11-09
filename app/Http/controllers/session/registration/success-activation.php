<?php

use Model\App;
use Model\Database;
use Model\Logger;
use Core\Validator;

$db = App::resolve(Database::class);
$logger  = new Logger($db);

if (isset($_GET["token"])) {
     $token_hash = hash("sha256", $_GET["token"]);

     $checkToken = $db->query("SELECT * FROM accounts WHERE account_activation_hash = :act_token_hash", [
         ":act_token_hash" => $token_hash
     ])->find();
     
     // var_dump($checkToken);
     
     if (!$checkToken) {
          abort(404);
     }

     $logger->log(
          'ACTIVATE',
          'success',
          'user',
          $checkToken['school_id'],
      );
     
     $db->query("UPDATE accounts SET account_activation_hash = NULL WHERE school_id = :id", [
         ":id" => $checkToken["school_id"]
     ]);
     
     view("session/registration/success-activation.view.php", [
         
     ]);
} else {
     abort(404);
     
}




