<?php include('header.php')?>
    <div class="container">
        <?php
        if(isset($_GET['message']))
        echo "<h4>".$_GET['message']."</h4>";
        ?>
    <form action="include/login_process.php" class="form" method="post">
        <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" name="uname" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-success">
        </div>
    </form>
</div>
<?php include('footer.php')?>
    