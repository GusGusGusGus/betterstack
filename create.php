<?php

$app = require "./core/app.php";

// Sanitize and validate inputs
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);

if (!$name || !$email || !$city) {
    // Redirect back with an error message if validation fails
    header('Location: index.php?error=Invalid input');
    exit;
}

// Create new instance of user
$user = new User($app->db);

// Insert it to database with validated data
$user->insert(array(
    'name' => $name,
    'email' => $email,
    'city' => $city
));

// Redirect back to index
header('Location: index.php');