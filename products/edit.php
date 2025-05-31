<?php
session_start();
include('header.php'); ?>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php
                if (isset($_SESSION['status']) && $_SESSION != '') {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong><?php echo $_SESSION['status'];
                        ?> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Products-image</h4>
                    </div>
                    <div class="card-body">
                        
                        <?php
 
 $connection = mysqli_connect("localhost" , "root" , "" , "crud_operations");
 $id = $_GET['id'];
 $fetch_image_query = "SELECT * FROM products WHERE id='$id'";
 $fetch_image_query_run = mysqli_query($connection , $fetch_image_query);
 if(mysqli_num_rows($fetch_image_query_run)>0)
 {
     foreach($fetch_image_query_run as $row)
     {
         // echo $row['id'];
         ?>
           <form action="code.php" method="post" enctype="multipart/form-data">
               <div class="form-group mb-3 ">
                   <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                </div>
                <label for="">Product Name</label>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Name" name="product-name" value="<?php echo $row['product-name'];?>">
                            </div>
                            <label for="">Product discription</label>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Name" name="product-disc" value="<?php echo $row['product-disc'];?>">
                            </div>
                            <label for="">Product price</label>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter the price"
                                    name="product-price" value="<?php echo $row['product-price'];?>">
                            </div>
                            <label for="">Choose product</label>
                            <div class="form-group mb-3">
                                <input type="file" class="form-control" placeholder="Add product" name="image" accept=".jpj, .png , .jpeg ," >
                                <input type="hidden" name="image-old" value="<?php echo $row['image'];?>">
                                <img src="<?php echo "uploads/".$row['image'];?>" width="75" height="75" alt="image">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="update_image" class="btn btn-info">Update product</button>
                                <a href="http://localhost:8080/falcon_backend/products/home.php" class="btn btn-primary">See products</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
}
else
{
    echo "no data found";
}
                    ?>
                 

<?php include('footer.php'); ?>
