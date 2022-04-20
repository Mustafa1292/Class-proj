<?php
include 'connnect.php';
if(isset($_POST['submit'])) {
  $firstName=$_POST['fname'];
  $lastName=$_POST['lname'];
  $address=$_POST['address'];
  $userName=$_POST['userName'];
  $passWord=$_POST['pass'];
  $email=$_POST['email'];
  $isAdmin='No';
  $isEmployee='No';

  $sql="insert into `users` (firstName, lastName, address, userName, emailUsers, pwdUsers)
  values('$firstName','$lastName','$address', '$userName', '$email', '$passWord')";
  $result=mysqli_query($con,$sql);
  if($result) {
    $_SESSION['uname'] = $userName;
    header('location:Login.php');
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
          <a href="../index.html">
            <h1>
              <span style="font-size: 36px; letter-spacing: 10px"
                ><em> UH Post Office </em></span
              >
            </h1>
            <h1><span style="font-size: 20px; letter-spacing: 5px"
                ><em>Sign up</em></h1>
          </a>
        </div>
      </div>
    </nav>

    <form method="POST">
      <div>
        <label for="fname" class="input"> First name: </label>
        <input
          type="text"
          id="fname"
          name="fname"
          placeholder="First Name"
          required
        />
      </div>
      <br />
      <div>
        <label for="lname" class="input"> Last name: </label>
        <input
          type="text"
          id="lname"
          name="lname"
          placeholder="Last Name"
          required
        />
      </div>

      <br />
      <div>
        <label for="address" class="input"> Address: </label>
        <input
          type="text"
          id="address"
          name="address"
          placeholder="address"
          required
        />
      </div>
      <br />
<div>
        <label for="userName" class="input"> Username: </label>
        <input
          type="text"
          id="userName"
          name="userName"
          placeholder="Username"
          required
        />
      </div>
      <br/>

      <div>
        <label for="pass" class="input"> Password: </label>
        <input
          type="password"
          id="pass"
          name="pass"
          placeholder="Password"
          required
        />
      </div>

      <br />

      <div>
        <label for="email" class="input"> Email: </label>
        <input
          type="Email"
          id="email"
          name="email"
          placeholder="Email"
          required
        />
      </div>

      <br />
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
