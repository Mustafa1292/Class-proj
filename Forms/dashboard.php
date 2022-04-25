<?php
include 'connnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Dashboard</title>
     <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="dashboard.css" />
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
            <h1><span style="font-size: 20px; letter-spacing: 5px"
                ><em> Admin Dash board</em></h1>
          <!-- </a> -->
        </div>
      </div>
    </nav>


<!-- the table -->

<button class="btn btn-success" style="margin: 5px"><a href="./add_package.php"> Add a package </a></button>
<button class="btn btn-primary" style="margin: 5px"><a href="./users.php"> View Users </a></button>
<button class="btn btn-info" style="margin: 5px"><a href="./epackages.php"> Personal Employee Packages </a></button>
<button class="btn btn-warning" style="margin: 5px"><a href="./reports.php"> Data reports </a></button>
<button class="btn btn-dark" style="margin: 5px"><a href="./logs.php"> Logs </a></button>
<button class="btn btn-danger" style="margin: 5px"><a href="./logout.php"> Log out </a></button>




<table class="table">
  <thead>
  <h3 style="color:black"> Incoming Packages For Houston Location</h3>
    <tr>
      <th scope="col">Package ID</th>
      <th scope="col">Weight</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Shipping Address</th>
      <th scope="col">Current Office</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $uname=$_SESSION['uname'];

    $sqll="Select * from `users` where emailUsers='$uname'";

    

    $resultt = mysqli_query($con, $sqll);
    if ($resultt) {
        $officeLoc=$roww['officeLoc'];
        $_SESSION['empStat']=$roww['isEmployee'];
    }

  $sql="Select * from `parcel` where office='Houston'";
  $result=mysqli_query($con, $sql);
  if($result) {
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['packageID'];
      $weight=$row['weight'];
      $sender1=$row['senderf'];
      $sender2=$row['senderl'];
      $receiver=$row['receiver'];
      $address=$row['outgoingLocation'];
      $office=$row['office'];
      $status=$row['status'];
      echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$weight.'</td>
      <td>'.$sender1." ".$sender2.'</td>
      <td>'.$receiver.'</td>
      <td>'.$address.'</td>
      <td>'.$office.'</td>
      <td>'.$status.'</td>
      <td> 
      <button class="btn btn-primary"> <a href="package_update.php?updateid='.$id.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"> <a href="delete_package.php?deleteid='.$id.'" class="text-light">Delete</a></button>
      </td>
    </tr>';
    }
  }

?>
    
 
    
  </tbody>
</table>

<table class="table">
  <thead>
  <h3 style="color:black"> Incoming Packages For San Antonio Location</h3>
    <tr>
      <th scope="col">Package ID</th>
      <th scope="col">Weight</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Shipping Address</th>
      <th scope="col">Current Office</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $uname=$_SESSION['uname'];

    $sqll="Select * from `users` where emailUsers='$uname'";

    

    $resultt = mysqli_query($con, $sqll);
    if ($resultt) {
        $officeLoc=$roww['officeLoc'];
        $_SESSION['empStat']=$roww['isEmployee'];
    }

  $sql="Select * from `parcel` where office='San Antonio'";
  $result=mysqli_query($con, $sql);
  if($result) {
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['packageID'];
      $weight=$row['weight'];
      $sender1=$row['senderf'];
      $sender2=$row['senderl'];
      $receiver=$row['receiver'];
      $address=$row['outgoingLocation'];
      $office=$row['office'];
      $status=$row['status'];
      echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$weight.'</td>
      <td>'.$sender1." ".$sender2.'</td>
      <td>'.$receiver.'</td>
      <td>'.$address.'</td>
      <td>'.$office.'</td>
      <td>'.$status.'</td>
      <td> 
      <button class="btn btn-primary"> <a href="package_update.php?updateid='.$id.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"> <a href="delete_package.php?deleteid='.$id.'" class="text-light">Delete</a></button>
      </td>
    </tr>';
    }
  }

?>
    
 
    
  </tbody>
</table>

<table class="table">
  <thead>
  <h3 style="color:black"> Incoming Packages For El Paso Location</h3>
    <tr>
      <th scope="col">Package ID</th>
      <th scope="col">Weight</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Shipping Address</th>
      <th scope="col">Current Office</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $uname=$_SESSION['uname'];

    $sqll="Select * from `users` where emailUsers='$uname'";

    

    $resultt = mysqli_query($con, $sqll);
    if ($resultt) {
        $officeLoc=$roww['officeLoc'];
        $_SESSION['empStat']=$roww['isEmployee'];
    }

  $sql="Select * from `parcel` where office='El Paso'";
  $result=mysqli_query($con, $sql);
  if($result) {
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['packageID'];
      $weight=$row['weight'];
      $sender1=$row['senderf'];
      $sender2=$row['senderl'];
      $receiver=$row['receiver'];
      $address=$row['outgoingLocation'];
      $office=$row['office'];
      $status=$row['status'];
      echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$weight.'</td>
      <td>'.$sender1." ".$sender2.'</td>
      <td>'.$receiver.'</td>
      <td>'.$address.'</td>
      <td>'.$office.'</td>
      <td>'.$status.'</td>
      <td> 
      <button class="btn btn-primary"> <a href="package_update.php?updateid='.$id.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"> <a href="delete_package.php?deleteid='.$id.'" class="text-light">Delete</a></button>
      </td>
    </tr>';
    }
  }

?>
    
 
    
  </tbody>
</table>


</body>
</html>
 