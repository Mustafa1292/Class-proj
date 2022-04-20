<?php

session_start();

$con=new mysqli('localhost', 'root', '', 'test');

if(!$con) {
  die(mysqli_error($con));
} else{
  //echo "success!";
}

?>
