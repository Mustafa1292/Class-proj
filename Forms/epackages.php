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
                ><em>Dash board</em></h1>
          <!-- </a> -->
        </div>
      </div>
    </nav>


<!-- the table -->

<button class="btn btn-warning" style="margin: 5px"><a href="employee.php"> Back to Dashboard </button>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Package ID</th>
      <th scope="col">Weight</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Shipping Address</th>
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
           $sender1=$row['senderf'];
           $sender2=$row['senderl'];
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
</table>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Package ID</th>
      <th scope="col">Weight</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Shipping Address</th>
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
</table>

</body>
</html>
 
