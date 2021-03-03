<?php
// Do not change the following two lines.
$teamURL = dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR;
$server_root = dirname($_SERVER['PHP_SELF']);

// You will need to require this file on EVERY php file that uses the database.
// Be sure to use $db->close(); at the end of each php file that includes this!

$dbhost = 'localhost';  // Most likely will not need to be changed
$dbname = 'cherrera_baby_project';   // Needs to be changed to your designated table database name
$dbuser = 'cherrera_user';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = '.J3Qh4d$,j6}M(?C'; // Needs to be changed to reflect your LAMP server credentials

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
    
    //SQL statement being executed in PHP that drops TEST table
    
    //'DROP TABLE `TEST`;';
}

