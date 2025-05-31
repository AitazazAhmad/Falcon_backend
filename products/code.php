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
if(isset($_POST['update_image']))
{
    $user_id = $_POST['id'];
$name = $_POST['product-name'];
$disc = $_POST['product-disc'];
$price = $_POST['product-price'];
$new_image = $_FILES['image']['name'];
$old_image = $_POST['image_old'];
if($new_image != '')
{
    $update_filename = $new_image;
    if(file_exists("uploads/".$_FILES['image']['name']))
    {
        $filename = $_FILES['image']['name'];
        $_SESSION['status']=$filename."Image Already exists";
        header('location: index.php');
    }
}
else
{
    $update_filename = $old_image;
}
$update_image_query = "UPDATE products SET name = '$name' , disc= '$disc' , price = '$price' , image = '$update_filename' WHERE id='$user_id'"; 
$update_image_query_run = mysqli_query($connection , $update_image_query);
if($update_image_query_run)
{
    if($_FILES['image']['name'] !='')
    {
       move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES['image']['name']);
       unlink("uploads/".$old_image);
    }
    $_SESSION['status'] = "image updated successfully !";
    header('location: home.php');
}
else
{
    $_SESSION['status'] = "image updated successfully !";
    header('location: edit.php');
}
}

?>