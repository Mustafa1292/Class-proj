<?php

include 'connnect.php';
$id=$_GET['updateid'];


$sqll="Select * from `parcel` where packageID='$id'";



$resultt=mysqli_query($con,$sqll);
//echo "$uname";

if($resultt){
    $roww=mysqli_fetch_assoc($resultt);
        //$_SESSION['id']=$roww['id'];
        $_SESSION['weight']=$roww['weight'];
        $_SESSION['receiver']=$roww['receiver'];
        $_SESSION['address']=$roww['outgoingLocation'];
        $_SESSION['office']=$roww['office'];
        //$_SESSION['officeLoc']=$roww['officeLoc'];

       
}


if(isset($_POST['submit'])) {
  $Weight=$_POST['Weight'];
  $Reciever=$_POST['receiver'];
  $Address=$_POST['Address'];
  $office=$_POST['office'];
  $Status=$_POST['Status'];

  $sql="update `parcel` set weight='$Weight', receiver='$Reciever', outgoingLocation='$Address', office='$office',status='$Status' where packageID=$id";
  $result=mysqli_query($con,$sql);

  $uname=$_SESSION['uname'];

  $sqll="Select * from `users` where emailUsers='$uname'";

  

  $resultt = mysqli_query($con, $sqll);
  if ($resultt) {
    $roww=mysqli_fetch_assoc($resultt);
      $stat=$roww['isAdmin'];
  }


if($result) {
  //echo '$stat';
  if($stat=='1'){
    header('location:dashboard.php');
  }
  else{
  header('location:employee.php');
  }
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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
          <a href="../index.html">
            <h1>
              <span style="font-size: 36px; letter-spacing: 10px"
                ><em> UH Post Office </em></span
              >
            </h1>
            <h1><span style="font-size: 20px; letter-spacing: 5px"
                ><em>Update</em></h1>
          </a>
        </div>
      </div>
    </nav>

       <form method="POST">
      <div>
        <label for="Weight" class="input"> Weight: </label>
        <input
          type="number"
          value="<?php echo $_SESSION['weight']?>"
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
          value="<?php echo $_SESSION['receiver']?>"
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
          value="<?php echo $_SESSION['address']?>"
          name="Address"
          placeholder="Shipping Address"
          required
        />
      </div>
      <br/>

      <br />

      <div>

<div style = "position:relative; left:0px; top:-50px;">
                <label for="office">New Office</label>
                <div style = "position:relative; left:15px; top:45px;">
                <select name="office"  id="officeLoc" required style="margin-left: 40%">
                    <option value="Houston">Houston</option>
                    <option value="San Antonio">San Antonio</option>
                    <option value="El Paso">El Paso</option>
                </select>
                </div>
            </div>
        
            
<div>
<div style = "position:relative; left:14px; top:15px;">
    
        <select id="Status" name="Status" required style="margin-left: 40%"> 
            <option value="In progress"> In progress</options> 
            <option value="Completed"> Completed</options> 
        </select> 

        <!-- <input
          type="numer"
          id="Weight"
          name="Weight"
          placeholder="Weight"
          required
        /> -->
</div>
      </div>

      <!-- <div>
        <button type="reset" > reset </button>
      </div> -->

      <br />
      <!-- <div> -->
        <!-- <button type="submit" class="btn btn-primary"> Submit </button> -->
      <!-- <button type="submit" name="submit" style="font-size: 20px; letter-spacing: 5px; padding: 15px; margin-left: 40%; margin-top: 3%; "> Submit </button> -->
      <!-- </div> -->
      <div class="d-grid col-4 mx-auto">
  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
</div>
    </form>
  </body>
</html>


?>
