<?php

$app = require "./core/app.php";

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);

if (!$name || !$email || !$city || !$phone) {
    header('Location: index.php?error=Invalid input');
    exit;
}

$user = new User($app->db);

$user->insert(array(
    'name' => $name,
    'email' => $email,
    'city' => $city,
	'phone' => $phone
));

echo json_encode(['name' => $name, 'email' => $email, 'city' => $city, 'phone' => $phone]);