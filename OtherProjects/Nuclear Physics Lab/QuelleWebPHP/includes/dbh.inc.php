<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "quelleliste_db";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


require_once 'dompdf/autoload.inc.php';



?>
<!DOCTYPE html>