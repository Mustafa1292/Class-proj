<?php
include "connnect.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: Login.php');
}

echo "<h4>Welcome, user </h4>".$_SESSION['uname'];

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="styles2.css" />
      </head>
<body>
  <nav id="nav">
      <div class="navTop">
        <div class="navItem">
          <!-- <a href="../index.html"> -->
            <h1>
              <span style="font-size: 36px; letter-spacing: 10px"
                ><em> UH Post Office </em></span
              >
            </h1>
            <h1><span style="font-size: 20px; letter-spacing: 5px;"
                ><em> User Dash board</em></h1>
          <!-- </a> -->
        </div>
      </div>
    </nav>
    <div class="container">
    <button class="btn btn-primary" name="logout" style=" margin: 5px;"><a href="Login.php" class="text-light">Log out
</a>
    </button>

    <button class="btn btn-primary" name="package"><a href="add_cus_package.php" class="text-light">Send a Package
</a>
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
//sql to search for username.
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
        <td>**********</td>
        <td>
        <button class="btn btn-primary"><a href="update.php?updateid='.$id.'">Update</a></button>
      </tr>';
    }

?>

</tbody>
</table></br>
<div>
  <h3 style="color:black"> Incoming packages</h3>
  <?php

  $uname=$_SESSION['uname'];//holds username from user.
  $sql = "SELECT * FROM users WHERE emailUsers='$uname'";
  $result = mysqli_query($con,$sql);
  $date = date("Y-m-d H:i:s");
 //---------------
  
  if($result){
    
    $row=mysqli_fetch_assoc($result);
    $fname=$row['firstName']; //Has the name of the Reciever.
    $lname=$row['lastName'];  //Has the last name of the reciever.
    
    $fulln = $fname . ' ' . $lname;

    //Search for receiver name in parcel.
    //echo $fulln;
    $sql2 = "SELECT * FROM parcel WHERE receiver= '$fulln'";
    $result2 = mysqli_query($con,$sql2);
    
    //Search in parcel for all packages that are in progress for fname.
    $parcel_stat = "SELECT * FROM parcel WHERE status!='Completed' AND receiver='$fulln'";
    $sql_search2 = mysqli_query($con,$parcel_stat);
    if($result2){
      if($sql_search2){
        $row2=mysqli_fetch_assoc($sql_search2);//$result2
        if($row2!=NULL){
        
          $time=$row2['time_stamp'];
          $d1 = date_create($time);
          $d2 = date_create($date);
          $diff = date_diff($d1,$d2); 
          $num = $diff->format('%a');

          if($num >= 7){
            ?>
            <h3 style="color:red"> Delayed </h3> <?php
            //Add Button to Contact Us.
            ?><h6 style="color:blue"> Contact Us </h6> <?php
          }
          else{
            ?>
            <h3 style="color:green"> On Time </h3> <?php
          }
        }
        else{
          ?>
          <h3 style="color:navy"> No Packages </h3> <?php
        }
      }
    }
    
  }
  ?>
  
  
  </br>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">packageID</th>
      <th scope="col">Weight</th>
      <th scope="col">Sender</th>
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
        $sender1=$row['senderf'];
        $sender2=$row['senderl'];
        $receiver=$row['receiver'];
        $outgoingLocation=$row['outgoingLocation'];
        $status=$row['status'];
        echo ' <tr>
        <th scope="row">'.$p_id.'</th>
        <td>'.$weight.'</td>
        <td>'.$sender1." ".$sender2.'</td>
        <td>'.$receiver.'</td>
        <td>'.$outgoingLocation.'</td>
        <td>'.$status.'</td>
        <td>
       
      </tr>';
      }
    }

?>

  </tbody>
</table></br>
<h3 style="color:black"> Outgoing packages</h3>
  </br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">packageID</th>
      <th scope="col">Weight</th>
      <th scope="col">Sender</th>
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
   
   $sql="Select * from `parcel` where senderf='$fname' and senderl='$lname'";
       $result2=mysqli_query($con,$sql);
       if($result2){
         while($row=mysqli_fetch_assoc($result2)){
       //$row=mysqli_fetch_assoc($result2);
       //echo "$p_id";
           $p_id=$row['packageID'];
           $weight=$row['weight'];
           $sender1=$row['senderf'];
           $sender2=$row['senderl'];
           $receiver=$row['receiver'];
           $outgoingLocation=$row['outgoingLocation'];
           $status=$row['status'];
           echo ' <tr>
           <th scope="row">'.$p_id.'</th>
           <td>'.$weight.'</td>
           <td>'.$sender1." ".$sender2.'</td>
           <td>'.$receiver.'</td>
           <td>'.$outgoingLocation.'</td>
           <td>'.$status.'</td>
           <td>
          
         </tr>';
         }
       }

?>
</tbody>
  </div>
</body>

</html>
