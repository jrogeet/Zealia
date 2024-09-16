<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    
    $accounts = $db->query("select * from accounts where account_type != 'admin'", [
    ])->findAll();

    $recentAccounts = $db->query("SELECT * FROM accounts WHERE account_type != 'admin' ORDER BY reg_date DESC LIMIT 5", [
    ])->findAll();


    foreach ($recentAccounts as $index => $account) {
        $dateString = $account['reg_date'];

        // Set the timezone to match your database's timezone
        $timezone = new DateTimeZone('Asia/Manila'); // Replace 'UTC' with your database's timezone if different

        // Create a DateTime object for the given date and time
        $givenDateTime = new DateTime($dateString, $timezone);

        // Get the current date and time in the same timezone
        $currentDateTime = new DateTime('now', $timezone);

        // Debugging: Print the timestamps and timezones
        error_log("Given DateTime: " . $givenDateTime->format('Y-m-d H:i:s') . " Timezone: " . $givenDateTime->getTimezone()->getName());
        error_log("Current DateTime: " . $currentDateTime->format('Y-m-d H:i:s') . " Timezone: " . $currentDateTime->getTimezone()->getName());

        // Calculate the difference between the current time and the given time
        $interval = $givenDateTime->diff($currentDateTime); // Note the order here

        // Extract days, hours, and minutes from the interval
        $daysAgo = $interval->days;
        $hoursAgo = $interval->h;
        $minutesAgo = $interval->i;

        $recentAccounts[$index]['daysAgo'] = $daysAgo;
        $recentAccounts[$index]['hoursAgo'] = $hoursAgo;
        $recentAccounts[$index]['minutesAgo'] = $minutesAgo;
    }



    $students = [];
    $professors = [];
    foreach ($accounts as $account) {
        if ($account['account_type'] === "student") {
            $students[] = $account;
        } elseif ($account['account_type'] === "professor") {
            $professors[] = $account;
        }
    }

    $rooms = $db->query("SELECT * FROM rooms")->findAll();

    $recentRooms = $db->query("SELECT * FROM rooms ORDER BY created_date DESC LIMIT 5")->findAll();
    foreach ($recentRooms as $index => $room) {

        $dateString = $room['created_date'];

        // Set the timezone to match your database's timezone
        $timezone = new DateTimeZone('Asia/Manila'); // Replace 'UTC' with your database's timezone if different

        // Create a DateTime object for the given date and time
        $givenDateTime = new DateTime($dateString, $timezone);

        // Get the current date and time in the same timezone
        $currentDateTime = new DateTime('now', $timezone);

        // Debugging: Print the timestamps and timezones
        error_log("Given DateTime: " . $givenDateTime->format('Y-m-d H:i:s') . " Timezone: " . $givenDateTime->getTimezone()->getName());
        error_log("Current DateTime: " . $currentDateTime->format('Y-m-d H:i:s') . " Timezone: " . $currentDateTime->getTimezone()->getName());

        // Calculate the difference between the current time and the given time
        $interval = $givenDateTime->diff($currentDateTime); // Note the order here

        // Extract days, hours, and minutes from the interval
        $daysAgo = $interval->days;
        $hoursAgo = $interval->h;
        $minutesAgo = $interval->i;

        $recentRooms[$index]['daysAgo'] = $daysAgo;
        $recentRooms[$index]['hoursAgo'] = $hoursAgo;
        $recentRooms[$index]['minutesAgo'] = $minutesAgo;
    }

    view('admin/admin-dashboard.view.php', [
        'accounts' => $accounts,
        'students' => $students,
        'professors' => $professors,
        'rooms' => $rooms,
        'recentAccounts' => $recentAccounts,
        'recentRooms' => $recentRooms,
    ]);
} else {
    abort(403);
}