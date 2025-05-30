<?php
include 'dbcon.php';
if(isset($_POST['store_checkout']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['address'];
    $state = $_POST['state'];
    $zonecode = $_POST['zonecode'];
    $cart = $_POST['cart'];

    if($name == "" || empty($name))
    {
        header('location:checkout.html?message=you need to fill in the first name');
    }
    else
    {
        $query = "insert into `check_out` (`name` , `email` , `phone` , `address` , `state` , `zone_code` , `cart`) values ('$name' , '$email' , '$phone' , '$addr' , '$state' , '$zonecode' , '$cart')";
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