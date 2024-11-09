<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app = require "./core/app.php";

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

if (!$name || !$email || !$city || !$phone) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$user = new User($app->db);

$user->insert(array(
    'name' => $name,
    'email' => $email,
    'city' => $city,
    'phone' => $phone
));

header('Content-Type: application/json');
echo json_encode(['name' => $name, 'email' => $email, 'city' => $city, 'phone' => $phone]);
exit;