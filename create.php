<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app = require "./core/app.php";

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);

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
echo json_encode([
    'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
    'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
    'city' => htmlspecialchars($city, ENT_QUOTES, 'UTF-8'),
    'phone' => htmlspecialchars($phone, ENT_QUOTES, 'UTF-8')
]);
exit;