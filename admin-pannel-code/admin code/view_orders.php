<?php session_start(); 
include('dbcon.php'); ?>
<?php include('header.php') ;?>
     <h1 id="main_title">FALCON DYNAMIC ENGINEERING</h1>

<div class="container">
    <div class="row justify-content-center">
        <div>
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
            <div class="box1">
                <div class="card-header">
                    <h4>Customer Detail's</h4>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Customer Name</th>
                                <th>Customer's Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>state</th>
                                <th>zone_code</th>
                                <th>payment_method</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $connection = mysqli_connect("localhost", "root", "", "crud_operations");

                            $fetch_image_query = "SELECT * FROM check_out";
                            $fetch_image_query_run = mysqli_query($connection, $fetch_image_query);

                            if (mysqli_num_rows($fetch_image_query_run) > 0) {
                                foreach ($fetch_image_query_run as $row) {
                                    ?>

                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['state']; ?></td>
                                        <td><?php echo $row['zone_code']; ?></td>
                                        <td><?php echo $row['payment']; ?></td>
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