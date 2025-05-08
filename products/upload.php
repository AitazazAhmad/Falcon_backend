<?php
include('dbcon.php') ;
if(isset($_POST['submit']))
{
    $file = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'products/'.$file_name;

    $query = mysqli_query($connection , "INSERT INTO `products` (images) VALUES('$file_name')");
    if(move_uploaded_file($tempname ,$folder))
    {
        echo "<h2>Product uploaded sucessfully</h2>";
    }
    else
    {
        echo "<h2>Failed to upload</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "post" enctype = "multipart/form-data">
        <input type="file" name="image">
        <br>
        <button type = "submit" name = "submit">Submit</button>
    </form>
    <div>
        <?php
        $res = mysqli_query($connection , "SELECT * from `products`");
        while($row = mysqli_fetch_assoc($res))
        {
            ?>
        <img src="products/<?php echo $row['images']?>" />
        <?php } ?>
    </div>
</body>
</html>