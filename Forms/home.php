<?php
include "connnect.php";
session_start();

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: Login.php');
}

echo "Welcome, user ".$_SESSION['uname'];

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dash</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary"><a href="user.php" class="text-light">Add user</a>
    
    </button>

    <table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">firstName</th>
      <th scope="col">lastName</th>
      <th scope="col">Address</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">pwdUsers</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php

$uname=$_SESSION['uname'];

$sql="Select * from `users` where emailUsers='$uname'";

$result=mysqli_query($con,$sql);

//echo "$uname";
if($result){
  $row=mysqli_fetch_assoc($result);
        $id=$row['id'];
        $fname=$row['firstName'];
        $lname=$row['lastName'];
        $address=$row['address'];
        $username=$row['userName'];
        $email=$row['emailUsers'];
        $password=$row['pwdUsers'];
        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$fname.'</td>
        <td>'.$lname.'</td>
        <td>'.$address.'</td>
        <td>'.$username.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        <td>
        <button><a href="update.php?updateid='.$id.'">Update</a></button>
        <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
        </td>
      </tr>';
    }

?>

</tbody>
</table>

<table class="table">
  <thead>
    <tr>
      <th scope="col">packageID</th>
      <th scope="col">Name</th>
      <th scope="col">Receiver</th>
      <th scope="col">Outgoing Loc</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php
$uname=$_SESSION['uname'];

$sql="Select * from `users` where emailUsers='$uname'";

$result=mysqli_query($con,$sql);

//echo "$uname";
if($result){
  $row=mysqli_fetch_assoc($result);
  $id=$row['id'];
  $fname=$row['firstName'];
  $lname=$row['lastName'];
  $address=$row['address'];
  $email=$row['emailUsers'];
  $password=$row['pwdUsers'];
}

$sql="Select * from `parcel` where outgoingLocation='$address'";
    $result2=mysqli_query($con,$sql);
    if($result2){
      while($row=mysqli_fetch_assoc($result2)){
    //$row=mysqli_fetch_assoc($result2);
    //echo "$p_id";
        $p_id=$row['packageID'];
        $weight=$row['weight'];
        $receiver=$row['receiver'];
        $outgoingLocation=$row['outgoingLocation'];
        $status=$row['status'];
        echo ' <tr>
        <th scope="row">'.$p_id.'</th>
        <td>'.$weight.'</td>
        <td>'.$receiver.'</td>
        <td>'.$outgoingLocation.'</td>
        <td>'.$status.'</td>
        <td>
       
      </tr>';
      }
    }

?>

  </tbody>
</table>
  </div>
</body>

</html>