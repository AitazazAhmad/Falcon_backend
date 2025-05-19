<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "crud_operations");

if (isset($_POST['save_image'])) {
    $name = $_POST['product-name'];
    $disc = $_POST['product-disc'];
    $price = $_POST['product-price'];
    $image = $_FILES['image']['name'];

    // Prepare the SQL query
    $insert_image_query = "INSERT INTO products (name, disc, price, image) VALUES ('$name', '$disc', '$price', '$image')";
    $insert_image_query_run = mysqli_query($connection, $insert_image_query);

    if ($insert_image_query_run) {
        // Move the uploaded file to the specified directory
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES['image']['name']);
        $_SESSION['status'] = "Image stored successfully";
        header('location: index.php');
        exit(); // Ensure no further code is executed after the redirect
    } else {
        $_SESSION['status'] = "Error: Image not stored";
        header('location: index.php');
        exit(); // Ensure no further code is executed after the redirect
    }
}
?>