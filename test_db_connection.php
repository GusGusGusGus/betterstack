<?php

$mysqli = new mysqli('host.docker.internal:49153', 'root', 'mysqlpw', 'betterstack');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Connected successfully to the database.";
}

$mysqli->close(); 