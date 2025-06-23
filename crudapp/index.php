<?php include('header.php') ?>
<?php include('dbcon.php') ?>
<div class="box1">
            <h2>All Employees</h2>
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
        <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD Employees</button>
        </div>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tbody>
                <?php 
                 
               $query = "select * from employees";
               $result = mysqli_query($connection , $query);
              if(!$result)
              {
                die("Query failed".mysqli_error());
              }
              else
              {
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['age'];?></td>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td><?php echo $row['role'];?></td>
                        <td><a href="update_page_1.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
                        <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        
                    <?php 
                    
                }
            }
            ?>

            </tbody>
        </thead>
    </table>
    <?php
  if(isset($_GET['message']))
  {
    echo "<h6>" .$_GET['message']. "</h6>";
  }
    ?>
    <?php
  if(isset($_GET['insert_msg']))
  {
    echo "<h6>" .$_GET['message']. "</h6>";
  }
    ?>
    <?php
  if(isset($_GET['delete_msg']))
  {
    echo "<h6>" .$_GET['delete_message']. "</h6>";
  }
    ?>
    <form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-dialog"> <!-- Added custom class here -->
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD Employees</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" name="l_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_name">User  Name</label>
                        <input type="text" name="u_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control"> <!-- Changed to password type -->
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_employees" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>
    <?php include('footer.php') ?>

   