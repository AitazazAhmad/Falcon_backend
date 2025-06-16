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
    $cart = $_POST['orderData'];
     $payment = $_POST['payment_method'];
    
    if($name == "" || empty($name))
    {
        header('location:checkout.html?message=you need to fill in the first name');
    }
    else
    {
        $query = "insert into `check_out` (`name` , `email` , `phone` , `address` , `state` , `zone_code` , `items` ,   `payment` ) values ('$name' , '$email' , '$phone' , '$addr' , '$state' , '$zonecode' , '$cart' , '$payment' )";
        $result = mysqli_query($connection,$query);
        if(!$result)
        {
            die("query failed".mysqli_error());
        }
        else
        {
            header('location:products.html?insert_msg=your data has been added successfully!');
        }
    }
// save_cart.php

// Read the raw POST body
$json = file_get_contents('php://input');

// Decode it to associative array
$data = json_decode($json, true);

// Check if carts key exists
if (isset($data['carts']) && is_array($data['carts'])) {
    foreach ($data['carts'] as $item) {
        // Safely get the name field
        $name = isset($item['name']) ? $item['name'] : 'No name';
        echo "Product Name: " . htmlspecialchars($name) . "<br>";
        
        // Optional: Store each item in your MySQL database here
    }
} else {
    echo "No cart data found.";
}

}
?>