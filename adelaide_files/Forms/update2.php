

<?php
include 'connnect.php';
$id=$_GET['updateid'];

$uname=$_SESSION['uname'];

$sqll="Select * from `users` where id='$id'";

$resultt=mysqli_query($con,$sqll);
//echo "$uname";

if($resultt){
    $roww=mysqli_fetch_assoc($resultt);
        $_SESSION['id']=$roww['id'];
        $_SESSION['fname']=$roww['firstName'];
        $_SESSION['lname']=$roww['lastName'];
        $_SESSION['address']=$roww['address'];
        $_SESSION['username']=$roww['userName'];
        $_SESSION['email']=$roww['emailUsers'];
        $_SESSION['pwd']=$roww['pwdUsers'];
        $_SESSION['admin']=$roww['isAdmin'];
        
        $_SESSION['employee']=$roww['isEmployee'];
        //$_SESSION['officeLoc']=$roww['officeLoc'];

       
}

$sq="Select isAdmin from `users` where emailUsers='$uname'";

$resul=mysqli_query($con,$sq);
if($resul){
    $ro=mysqli_fetch_assoc($resul);
    $stat=$ro['isAdmin'];
}

/*
if(isset($_POST['leave'])){
    header('location: users.php');}
*/
if(isset($_POST['submit'])){
        $fname=$_POST['firstName'];
        $lname=$_POST['lastName'];
        $address=$_POST['address'];
        $username=$_POST['userName'];
        $email=$_POST['emailUsers'];
        $password=$_POST['pwdUsers'];
        //$admin=$_POST['isAdmin'];
        $employee=$_POST['isEmployee'];
        //$office=$_POST['officeLoc'];
    
        
    $sql="update users set id=$id,firstName='$fname',lastName='$lname',address='$address',userName='$username',emailUsers='$email',pwdUsers='$password',isEmployee='$employee' where id=$id";
   
    $result=mysqli_query($con,$sql);
    if($result){
        if($stat=='1'){
            header('location:users.php');
        }
        else{
        header('location:users2.php');
        }
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
                <input type="text" value="<?php echo $_SESSION['fname']?>" class="form-control" name="firstName">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" value="<?php echo $_SESSION['lname']?>"  class="form-control" name="lastName">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" value="<?php echo $_SESSION['address']?>" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" value="<?php echo $_SESSION['username']?>" class="form-control" placeholder="Enter your new username" name="userName">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="<?php echo $_SESSION['email']?>" class="form-control" placeholder="Enter your new email" name="emailUsers">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" value="<?php echo $_SESSION['pwd']?>" class="form-control" placeholder="Enter your new password" name="pwdUsers">
            </div>

            <div class="form-group">
                <label>Employee Status</label>
                <input type="text" value="<?php echo $_SESSION['employee']?>" class="form-control" placeholder="change to 1 to make an employee, change to 0 to remove" name="isEmployee">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <button type="leave" class="btn btn-primary" name="leave">Return to users</button>
        </form>

    </div>

    <!-- thing that is like: track package, update information, delete account-->

</html>