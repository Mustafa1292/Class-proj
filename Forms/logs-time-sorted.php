<?php 
    include "connnect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Logs</title>
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
          <a href="dashboard.php">
            <h1>
              <span style="font-size: 36px; letter-spacing: 10px"
                ><em> UH Post Office </em></span
              >
            </h1>
            <h1><span style="font-size: 20px; letter-spacing: 5px"
                ><em> Logs</em></h1>
          </a>
        </div>
      </div>
    </nav>


    <button class="btn btn-success" style="margin: 5px"><a href="./logs-id-sorted.php"> Sort by ID </a></button>
    <button class="btn btn-primary" style="margin: 5px"><a href="./logs-time-sorted.php"> Sort by Time Stamp </a></button>
    <button class="btn btn-info" style="margin: 5px"><a href="./logs-action-sort.php"> Sort by Action </a></button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">User Email</th>
      <th scope="col">User Username</th>
      <th scope="col">User Password</th>
      <th scope="col">Action</th>
      <th scope="col">Time Stamp</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
  $sql="SELECT * from logs ORDER BY cdate DESC";
  $result=mysqli_query($con, $sql);
  if($result) {
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['user_id'];
      $email=$row['user_email'];
      $u_name=$row['user_Uname'];
      $u_pass=$row['user_pass'];
      $action=$row['action'];
      $address=$row['cdate'];
      echo '<tr>
      <th>'.$id.'</th>
      <td>'.$email.'</td>
      <td>'.$u_name.'</td>
      <td> ************* </td>
      <td>'.$action.'</td>
      <td>'.$address.'</td>
    </tr>';
    }
  }

?>
    
  </tbody>
</table>



</body>
</html>