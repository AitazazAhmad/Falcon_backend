<?php
include 'dbcon.php';
if(isset($_POST['push_data']))
{
    $N = $_POST['Name'];
    $E = $_POST['E_mail'];
    $pass = $_POST['password'];
    
   

     $query = "insert into `user_data` (`name` , `email` , `password`) values ('$N' , '$E' , '$pass')";      
    // $query = "INSERT INTO `user_data` (`name`, `email`, `password`) VALUES ('$N', '$E', '$pass')";
        $result = mysqli_query($connection,$query);
        if(!$result)
        {
            die("query failed".mysqli_error());
        }
        else
        {
            header('location:signup.php?insert_msg=your data has been added successfully!');
        }
    }
    

?>