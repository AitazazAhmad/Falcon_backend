<?php include('header.php') ?>
<?php session_start() ?>
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
                   <li> <button id="logout-btn"  onclick="logout()">Logout</button></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
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