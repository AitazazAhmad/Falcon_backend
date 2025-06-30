<?php session_start(); 
include('header.php'); ?>
  <!-- side navbar start -->
<div id="adminContent">
        
    <div id="sidebar">
        <div class="sidebar_content sidebar_head">
            <h1>Admin</h1>
        </div>

        <div class="sidebar_content sidebar_body">
            <nav class="side_navlinks">
                <ul>
                    <li><a href="http://localhost:8080/falcon_backend/admin-pannel-code/admin-code/admin.php">DashBoard</a></li>
                    <li><a href="http://localhost:8080/falcon_backend/crudapp/">Add Employees</a></li>
                    <li><a href="http://localhost:8080/falcon_backend/products/index.php">Add products</a></li>
                    <li><a href="http://localhost:8080/falcon_backend/admin-pannel-code/admin-code/view_orders.php">View Order's</a></li>
                   <li> <button  onclick="logout()">Logout</button></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
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
                    <h4>Fetch image from database</h4>
                </div>
                <div class="card-body">

                    <table class="table table-success table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product-Image</th>
                                <th scope="col">Edit product-Image</th>
                                <th scope="col">Delete product-Image</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $connection = mysqli_connect("localhost", "root", "", "crud_operations");

                            $fetch_image_query = "SELECT * FROM products";
                            $fetch_image_query_run = mysqli_query($connection, $fetch_image_query);

                            if (mysqli_num_rows($fetch_image_query_run) > 0) {
                                foreach ($fetch_image_query_run as $row) {
                                    ?>

                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['disc']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td>
                                            <img src="<?php echo "uploads/".$row['image']; ?>" width="75" height="75" alt="products">
                                        </td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit image</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                                            <button type="submit" class="btn btn-danger" name="delete_image">Delete image</button>
                                            </form>
                                        </td>

                                    </tr>

                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">NO RECORD FOUND</td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>