<?php

session_start();

$con=new mysqli('localhost', 'root', 'David1021?', 'test');

if(!$con) {
  die(mysqli_error($con));
} else{
  //echo "success!";
}

?>