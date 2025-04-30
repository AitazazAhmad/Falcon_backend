<?php include('dbcon.php')?>
<?php session_start();?>
<?php
if(isset($_POST['login']))
{
    $username = $_POST['uname'];
    $password = $_POST['password'];
    echo $username;
}

 $query = "select * from `employees` where `user_name` = '$username' and `password` = '$password'";

 $result = mysqli_query($con, $query);
 if(!$result)
 {
    die("query failed".mysqli_error());
 }
 else
 {
    $row = mysqli_num_rows($result);
    if($row ==1)
    {
        $_SESSION["uname"] = $username;
        header('location:../home.php');
    }
    else
    {
        header('location:../index.php?message=sorry your user name or password are invalid');
    }
 }


?>