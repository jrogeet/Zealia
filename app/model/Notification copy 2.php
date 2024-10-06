<?php
// use Model\App;
// use Model\Database;

// $db = App::resolve(Database::class);

// // Set file mime type event-stream
// header('Content-Type: text/event-stream');
// header('Cache-Control: no-cache');


// $last_check_time = date('Y-m-d H:i:s');

// while (true) {
//     $notifications = $db->query('SELECT * FROM notifications WHERE created_at > :last_check_time', [
//         'last_check_time' => $last_check_time
//     ])->findAll();

//     if ($notifications) {
//         // Update the last check time
//         $last_check_time = date('Y-m-d H:i:s');

//         $notRead = [];
//         $hadRead = [];
//         foreach ($notifications as $notification) {
//             if ($notification['read_status'] == 0) {
//                 $notRead[] = $notification;
//             } elseif ($notification['read_status'] == 1) {
//                 $hadRead[] = $notification;
//             }
//         }

//         echo "data: " . json_encode([
//             'notifications' => $notifications,
//             'notRead' => $notRead,
//             'hadRead' => $hadRead
//         ]) . "\n\n";
        
//         flush();

//         // Exit the loop once new notifications are sent (this stops the server waiting)
//         break;
//     }

//     // Sleep for a short time before the next check
//     usleep(500000); // 0.5 seconds
// }
// ?>
