<?php
    include_once 'includes/databaseConnect.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            print "Listing users" . "<br>";
            print "UserName" . " ". "Email" . "<br>";
            $sql = "SELECT * FROM users;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['userName'] . " " . $row['emailUsers'] . "<br>";
                }
            }
        ?>
        <input type="button" value="Say Hi!" onclick="location='test.php'" />
    </body>
</html>