<?php
  
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "test";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    echo "Failed";
}
?>