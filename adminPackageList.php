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
            print "Package list";
            print "PackageID" . " " . "name" . " " . "reciever" . " " . "Outgoinglocation" . " " . "status" . "<br>";
            // Grab all the package info
            $sql = "SELECT * FROM package;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['packageID'] . " " . $row['name'] . " " . $row['receiver'] . " " . $row['outgoingLocation'] . " " . $row['status'] . "<br>";

                }
            }
        ?>
        <input type="button" value="See Users" onclick="location='adminUserList.php'" />
    </body>
</html>