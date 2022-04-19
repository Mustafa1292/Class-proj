<?php


    include 'connnect.php';
   //include 'config/db.php';

    //Initialize variables
    $firstName = "";
    $lastName = "";
    /* $address = ""; */
    $userName = ""; //do check for this one.
    $emailUsers = ""; //do check for this one.
    $pwdUsers = "";


    if(isset($_POST['submit'])){ 
        //variable for username
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        /* $address = $_POST['address']; */
        $userName = $_POST['userName'];
        $emailUsers = $_POST['email'];
        $pwdUsers = $_POST['pass'];

        //$sql_fn = "SELECT * FROM users WHERE firstName= '$firstName'";
        //$sql_ln = "SELECT * FROM users WHERE lastName= '$lastName'";
        $sql_u = "SELECT * FROM users WHERE userName= '$userName'";
        $sql_e = "SELECT * FROM users WHERE emailUsers= '$emailUsers'";

        //---------------------------THESE ARE THE QUERY SEARCHES/VARIABLES----------------------------//

        $res_u = mysqli_query($con, $sql_u) or die(mysqli_error($con)); //userName query
        $res_e = mysqli_query($con, $sql_e) or die(mysqli_error($conn)); //email query

        //---------------------------------------------------------------------------------------------//
        if(mysqli_num_rows($res_u) > 0){
            $name_error = "Sorry, this username already exists, please try another.";
        }
        else if(mysqli_num_rows($res_e) > 0){
            $email_error = "Sorry, this email is already in use.";
        }
        else{
            $query = "INSERT INTO users (firstName, lastName, userName, emailUsers, pwdUsers) 
                VALUES('$firstName', '$lastName', '$userName', '$emailUsers','$pwdUsers')";

            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            //place header location for the login page / dashboard page .
            header('location: login.php');
            //exit();  
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
          value= "<?php echo $firstName; ?>"
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
          value= "<?php echo $lastName; ?>"
        />
      </div>

      <br />
<!--       <div>
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
      <br /> -->

      <div
        <?php if(isset($name_error)): ?>
          class = "form_error"
        <?php endif; ?>
      >
        <label for="userName" class="input"> Username: </label>
        <input
          type="text"
          id="userName"
          name="userName"
          placeholder="Username"
          required
          value= "<?php echo $userName; ?>"
        />
        <?php if(isset($name_error)): ?>
          <span><?php echo $name_error; ?></span>
          <?php endif; ?>
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

      <div
        <?php if(isset($email_error)): ?>
          class = "form_error"
        <?php endif; ?>
      
      >
        <label for="email" class="input"> Email: </label>
        <input
          type="Email"
          id="email"
          name="email"
          placeholder="Email"
          required
          value= "<?php echo $emailUsers; ?>"
        />
        <?php if(isset($email_error)): ?>
          <span><?php echo $email_error; ?></span>
          <?php endif; ?>
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