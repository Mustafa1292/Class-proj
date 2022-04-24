<?php

include 'connnect.php';

if(isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $uname=$_SESSION['uname'];

    $sqll="select isAdmin from `users` where emailUsers=$uname";
    if ($resultt) {
        $roww=mysqli_fetch_assoc($resultt);
          $stat=$roww['isAdmin'];
    }

    //$resultt=mysqli_query($con,$sqll);
//echo "$uname";

 

    $sql="delete from `parcel` where packageID=$id";
    $result=mysqli_query($con, $sql);
    if($result){
        if($stat=='1'){
            header('location:dashboard.php');
          }
          else{
          header('location:employee.php');
          }
    } else {
        die(mysqli_error($con));
    }
}
?>