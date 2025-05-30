<?php include('header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                <th scope="col">Image</th>
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