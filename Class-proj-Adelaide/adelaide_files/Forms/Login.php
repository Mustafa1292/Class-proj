<?php

include 'connnect.php';

if(isset($_POST['but_submit'])){

  $uname = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['pass']);

/*   echo  "<h3 style='color:red; text-align:center;'>$uname </h3>";
  echo "<h3 style='color:red; text-align:center;'> $password </h3>"; */

  if ($uname != "" && $password != ""){

      $sql_query = "select count(*) as cntUser from users where emailUsers='".$uname."' and pwdUsers='".$password."'";
      $result = mysqli_query($con,$sql_query);
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];

      if($count > 0){
          $_SESSION['uname'] = $uname;

          $sqll="Select isAdmin from `users` where emailUsers='$uname'";
          $resultt=mysqli_query($con,$sqll);
          $roww=mysqli_fetch_assoc($resultt);
          if($roww['isAdmin']=='1'){
            header('location: dashboard.php');
          }else{
          header('Location: home.php');
          }
      }else{
          $login_error = "Invalid Username or Password";
/*           echo "<h2 style='color:red; text-align:center;'> Invalid username and password </h2>";
 */      }
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
    <title>User Login</title>
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
                ><em>Login</em></h1>
          </a>
        </div>
      </div>
    </nav>
    <!-- <form action="action_page.php" method="POST"> -->
    <form method=post>

      <br />

      <div
        <?php if(isset($login_error)): ?>
          class = "form_error";
        <?php endif; ?>
      >
        <label for="email" class="input"> Email: </label>
        <input
          type="Email"
          id="email"
          name="email"
          placeholder="Email"
          required
        />
        <?php if(isset($login_error)): ?>
          <span><?php echo $login_error; ?></span>
          <?php endif; ?>
      </div>

      <div
        <?php if(isset($login_error)): ?>
          class = "form_error";
        <?php endif; ?>
      >
        <label for="pass" class="input"> Password: </label>
        <input
          type="password"
          id="pass"
          name="pass"
          placeholder="Password"
          required
        />
        <?php if(isset($login_error)): ?>
          <span><?php echo $login_error; ?></span>
          <?php endif; ?>
      </div>

      
      

      <br />
      <div>
        <button type=submit name="but_submit" class="btn btn-primary" style="margin-left:40%">Submit</button>
      </div>
    </form>
  </body>
</html>

