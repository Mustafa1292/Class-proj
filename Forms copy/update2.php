

<?php
include 'connnect.php';
$id=$_GET['updateid'];

if(isset($_POST['submit'])){
        $fname=$_POST['firstName'];
        $lname=$_POST['lastName'];
        $address=$_POST['address'];
        $username=$_POST['userName'];
        $email=$_POST['emailUsers'];
        $password=$_POST['pwdUsers'];
        $admin=$_POST['isAdmin'];
        $employee=$_POST['isEmployee'];
    
        
    $sql="update users set id=$id,firstName='$fname',lastName='$lname',address='$address',userName='$username',emailUsers='$email',pwdUsers='$password',isAdmin='$admin',isEmployee='$employee' where id=$id";
   
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "snger";
        //$_SESSION['uname'] = $username;
       header('location:dashboard.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>User Dashboard</title>
</head>

<body>
    <h1>User Dashboard</h1>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Correct first name" name="firstName">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Correct last name" name="lastName">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter new address" name="address">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter new username" name="userName">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter new email" name="emailUsers">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Enter new password" name="pwdUsers">
            </div>
            <div class="form-group">
                <label>Admin Status</label>
                <input type="text" class="form-control" placeholder="change to 1 to make an admin, change to 0 to remove status" name="isAdmin">
            </div>
            <div class="form-group">
                <label>Employee Status</label>
                <input type="text" class="form-control" placeholder="change to 1 to make an employee, change to 0 to remove" name="isEmployee">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

    </div>

    <!-- thing that is like: track package, update information, delete account-->

</html>