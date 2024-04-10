<?php 
require 'constants.php';

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
