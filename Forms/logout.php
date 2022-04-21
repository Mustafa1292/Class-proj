<?php 
include 'connnect.php';

session_destroy();
 echo "<h3>Come again! Click below to return home or login.</h3>";

 

?>

<!DOCTYPE html>
<html lang="en">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../stylesheets/styles.css" />
    <link rel="stylesheet" href="styles2.css" />
 <body>
<div><nav id="nav">
      <div class="navTop">
        <div class="navItem">
          <a href="../index.html">
            <h1>
              <span style="font-size: 36px; letter-spacing: 10px"
                ><em> UH Post Office </em></span
              >
            </h1>
            <h1><span style="font-size: 20px; letter-spacing: 5px"
                ><em>Logout</em></h1>
          </a>
        </div>
      </div>
    </nav>
        <button type=submit name="submit" class="btn btn-primary"><a href="Login.php">return</a></button>
      </div>
</body>
</html>
