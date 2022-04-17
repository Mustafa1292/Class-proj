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
            print "Admin choices";
        ?>
        <input type="button" value="See user list!" onclick="location='adminUserList.php'" />
        <input type="button" value="See package list!" onclick="location='adminPackageList.php'" />
        <input type="button" value="Logout!" onclick="location='index.html'" />
    </body>
</html>