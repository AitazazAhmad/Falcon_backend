<?php
include 'dbcon.php';
if(isset($_POST['add_employees']))
{
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];
    $u_name = $_POST['u_name'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    if($f_name == "" || empty($f_name))
    {
        header('location:index.php?message=you need to fill in the first name');
    }
    else
    {
        $query = "insert into `employees` (`first_name` , `last_name` , `age` , `user_name` , `password` , `role`) values ('$f_name' , '$l_name' , '$age' , '$u_name' , '$pass' , '$role')";
        $result = mysqli_query($connection,$query);
        if(!$result)
        {
            die("query failed".mysqli_error());
        }
        else
        {
            header('location:index.php?insert_msg=your data has been added successfully!');
        }
    }
}
?>