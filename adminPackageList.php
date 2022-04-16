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
        ?>
        <input type="button" value="See Users" onclick="location='test.php'" />
    </body>
</html>