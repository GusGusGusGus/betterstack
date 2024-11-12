<?php

/*
* This is template of database config.
* Fill out database configuration options below and rename this file to 'database.php'
*/

$database = array(
    'address'    => getenv('DB_HOST'),
    'username'   => getenv('DB_USER'),
    'password'   => getenv('DB_PASS'), 
    'database'   => getenv('DB_NAME'),
	'port'       => getenv('DB_PORT'), 
    'sslmode'    => 'require',         // Azure MySQL requires SSL
    'sslca'      => __DIR__ . '/../ssl/DigiCertGlobalRootCA.crt.pem', // SSL certificate path for Windows
    'options'    => array(
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false, // Disable certificate verification for Windows
    ),
);
