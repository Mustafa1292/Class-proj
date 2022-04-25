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

$uname=$_SESSION['uname'];

$sqll="Select isAdmin from `users` where emailUsers='$uname'";

$resultt=mysqli_query($con,$sqll);
//echo "$uname";

if($resultt){
    $roww=mysqli_fetch_assoc($resultt);
    if($roww['isAdmin']=='1'){
      $locc="dashboard.php";
      $_SESSION['l']=$locc;
    }else{
      $locc="employee.php";
      $_SESSION['l']=$locc;
    }}
// logout
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: Login.php');
}

if(isset($_POST['return'])){
  if($roww['isEmployee']=='1'){
  header('Location: employee.php');
  }
  else{
    header('location: dashboard.php');
  }
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
          <a href="dashboard.php" style="text-decoration: none">
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
    <button type="submit"button class="btn btn-primary" name="return" style="margin: 5px"><a href=<?php echo $_SESSION['l']?>>Return to Dash</a>
    
    </button>

    <button class="btn btn-danger" name="logout"><a href="login.php" >Log out</a></button>
    
    

<table class="table">
<h3 style="color:black"> Customer Data</h3>
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

$sql="Select * from `users` where isEmployee!='1'";

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
       
          $loc="update2.php?updateid=";
        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$fname.'</td>
        <td>'.$lname.'</td>
        <td>'.$address.'</td>
        <td>'.$username.'</td>
        <td>'.$email.'</td>
        <td>*********</td>
        <td>
        <button class="btn btn-primary"><a href='.$loc.''.$id.'>Update</a></button>
       
        </td>
      </tr>';
  }
    }

?>

</tbody>
</table>
<table class="table">
<h3 style="color:black"> Employee Data</h3>
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">firstName</th>
      <th scope="col">lastName</th>
      <th scope="col">Address</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">pwdUsers</th>
      <th scope="col">Office</th>
      <th scope="col">Admin</th>
      <th scope="col">Employee</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php

$uname=$_SESSION['uname'];

$sql="Select * from `users` where isEmployee!='0'";

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
        $office=$row['officeLoc'];
        $admin=$row['isAdmin'];
        $employee=$row['isEmployee'];
          $loc="employeeUpdate.php?updateid=";

        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$fname.'</td>
        <td>'.$lname.'</td>
        <td>'.$address.'</td>
        <td>'.$username.'</td>
        <td>'.$email.'</td>
        <td>*********</td>
        <td>'.$office.'</td>
        <td>'.$admin.'</td>
        <td>'.$employee.'</td>
        <td>
        <button class="btn btn-primary"><a href='.$loc.''.$id.'>Update</a></button>
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
