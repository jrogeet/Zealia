<?php

$data = json_decode(file_get_contents('php://input'), true);
$_SESSION['page-settings']['admin_nav_toggle'] = $data['toggle'];

header('Content-Type: application/json');
echo json_encode(['success' => true]);