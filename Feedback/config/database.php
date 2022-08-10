<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'busolami');
define('DB_PASS', '12345');
define('DB_NAME', 'php_dev');

//Create Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Check Connection
If($conn-> connect_error){
    die('Connectiuon Failed '. $conn ->connect_error);
}

