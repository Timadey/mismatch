<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME ='mismatch';
$IMAGE_PATH = '../assets/profilepicture/';
define ('DB_HOST', $DB_HOST);
define ('DB_USER', $DB_USER);
define ('DB_PASSWORD', $DB_PASSWORD);
define ('DB_NAME', $DB_NAME);
define ('IMAGEPATH', $IMAGE_PATH);

$dbs = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die ("Error connecting to server");
mysqli_select_db($dbs, DB_NAME) or die ("Error connecting to database.");

?>