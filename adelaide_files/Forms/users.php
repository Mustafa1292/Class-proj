<?php
include "connnect.php";


// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: Login.php');
}

$uname=$_SESSION['uname'];

$sql="Select isAdmin from `users` where emailUsers='$uname'";

$result=mysqli_query($con,$sql);

//echo "$uname";

/*if($result){
    $row=mysqli_fetch_assoc($result);
    $admin=$row['isAdmin'];
    if($admin==0){
        header('Location: dashboard.php');
    }
}*/


echo "<h5>Welcome, user</h5> ".$_SESSION['uname'];

// logout
if(isset($_POST['logout'])){
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../stylesheets/styles.css" />
    <link rel="stylesheet" href="styles2.css" />
</head>
<body>
  <nav id="nav">
      <div class="navTop">
        <div class="navItem">
          <a href="../index.html" style="text-decoration: none">
            <h1>
              <span style="font-size: 36px; letter-spacing: 10px"
                ><em> UH Post Office </em></span
              >
            </h1>
            <h1><span style="font-size: 20px; letter-spacing: 5px"
                ><em>Users</em></h1>
          </a>
        </div>
      </div>
    </nav>
    <div>
    <button class="btn btn-primary" name="return" style="margin: 5px"><a href="dashboard.php" >Return to Dash</a>
    
    </button>

    <button class="btn btn-danger" name="logout"><a href="login.php" >Log out</a></button>
    
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
      <th scope="col">Admin</th>
      <th scope="col">Employee</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php

$uname=$_SESSION['uname'];

$sql="Select * from `users`";

$result=mysqli_query($con,$sql);
$admin=0;
//echo "$uname";
if($result){
  while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $fname=$row['firstName'];
        $lname=$row['lastName'];
        $address=$row['address'];
        $username=$row['userName'];
        $email=$row['emailUsers'];
        $password=$row['pwdUsers'];
        $admin=$row['isAdmin'];
        $employee=$row['isEmployee'];
        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$fname.'</td>
        <td>'.$lname.'</td>
        <td>'.$address.'</td>
        <td>'.$username.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        <td>'.$admin.'</td>
        <td>'.$employee.'</td>
        <td>
        <button class="btn btn-primary"><a href="update2.php?updateid='.$id.'">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'">Delete</a></button>
        </td>
      </tr>';
  }
    }

?>

</tbody>
</table>
  </div>
</body>

</html>