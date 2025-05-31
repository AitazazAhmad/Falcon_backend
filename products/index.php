<?php include('header.php') ?>
<?php session_start() ?>
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

             
                <div class="card">
                    <div class="card-header">
                        <h4>PHP PRODUCTS</h4>
                    </div>
                    <label for="">Product Name</label>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Name" name="product-name">
                            </div>
                            <label for="">Product discription</label>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Name" name="product-disc">
                            </div>
                            <label for="">Product price</label>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter the price"
                                    name="product-price">
                            </div>
                            <label for="">Choose product</label>
                            <div class="form-group mb-3">
                                <input type="file" class="form-control" placeholder="Add product" name="image" accept=".jpj, .png , .jpeg ," >
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="save_image" class="btn btn-primary">Save product</button>
                                <a href="http://localhost:8080/falcon_backend/products/home.php" class="btn btn-primary">See products</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php') ?>