<?php
$connection = mysqli_connect("localhost" , "root" , "" , "crud_operations");

if($connection == false)
{
    die("connection Error:".mysqli_connect_error());
}

?>the