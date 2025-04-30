<?php include('dbcon.php')?>
<?php session_start();?>
<?php
if(isset($_POST['login']))
{
    $name = $_POST['Name'];
    $mail = $_POST['E_mail'];
    $password = $_POST['password'];
    echo $username;
}

$query = "SELECT * FROM `user_data` WHERE `name` = '$name' AND `email` = '$mail' AND `password` = '$password'";

 $result = mysqli_query($connection, $query);
 if(!$result)
 {
    die("query failed".mysqli_error());
 }
 else
 {
    $row = mysqli_num_rows($result);
    if($row ==1)
    {
        $_SESSION["Name"] = $username;
        header('location:http://127.0.0.1:5500/Public-Site/index.html');
    }
    else
    {
        header('location:error_msg.php');
    }
 }


?>