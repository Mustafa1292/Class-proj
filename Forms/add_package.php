<?php
include 'connnect.php';
if(isset($_POST['submit'])) {
  $Weight=$_POST['Weight'];
  $Reciever=$_POST['receiver'];
  $Address=$_POST['Address'];
  $Status=$_POST['Status'];

  echo "$Weight";

  $sql="insert into `parcel` (weight, receiver, outgoingLocation, status)
  values('$Weight','$Reciever', '$Address', '$Status')";
  $result=mysqli_query($con,$sql);
  echo "$Weight";
  if($result) {
    header('location:dashboard.php');
  } else {
     die(mysqli_error($con));
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up From!</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../stylesheets/styles.css" />
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
                ><em>Add a package</em></h1>
          </a>
        </div>
      </div>
    </nav>

    <form method="POST">
      <div>
        <label for="Weight" class="input"> Weight: </label>
        <input
          type="number"
          id="Weight"
          name="Weight"
          placeholder="Weight"
          required
        />
      </div>
      <br />
      <div>
        <label for="Receiver" class="input"> Receiver: </label>
        <input
          type="text"
          id="Receiver"
          name="receiver"
          placeholder="Receiver"
          required
        />
      </div>

      <br />
<div>
        <label for="Address" class="input"> Shipping Address: </label>
        <input
          type="text"
          id="Address"
          name="Address"
          placeholder="Shipping Address"
          required
        />
      </div>
      <br/>

      <br />
<div>
        
    
        <select id="Status" name="Status" required style="margin-left: 40%"> 
            <option value="In progress"> In progress</options> 
        </select> 

        <!-- <input
          type="numer"
          id="Weight"
          name="Weight"
          placeholder="Weight"
          required
        /> -->
      </div>

      <!-- <div>
        <button type="reset" > reset </button>
      </div> -->

      <br />
      <div>
        <button type="submit" name="submit" style="font-size: 20px; letter-spacing: 5px; padding: 15px; margin-left: 40%; margin-top: 3%; "> Submit </button>
      </div>
    </form>
  </body>
</html>