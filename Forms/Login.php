<?php
include 'connnect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <form>

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
        <button type=submit><a href="dashboard.php"> Submit
        
        
</a></button>
      </div>
    </form>
  </body>
</html>
