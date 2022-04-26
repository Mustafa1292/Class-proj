<?php

include 'connnect.php';

if(isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    //$resultt=mysqli_query($con,$sqll);
//echo "$uname";

 

    $sql="delete from `parcel` where packageID=$id";
    $result=mysqli_query($con, $sql);
    if($result){
            header('location:dashboard.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
