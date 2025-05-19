<?php include('signin_header.php') ?>
<?php include('dbcon.php.php') ?>
<?php
if(isset($_GET['message']))
{
    echo "<h4>".$_GET['mesage']."</h4>";
}
?>
    <div class="container">
        <div class="form-box">
            <div class="left-side">
                <h2>Hello friend!</h2>
                <p>Glad to see you! sign in to get started</p>
            </div>
            <div class="right-side">
                <form id="signup-form" action = "user_login_process.php" method = "post" class = "form">
                    <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input type="text" id="Name" placeholder="User Name" required name = "Name">
                    </div>
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="Password" placeholder="Password" required name = "password">
                    </div>
                    <br>
                    <!-- <button type="submit" class="btn" name = "login">Login</button> -->
                     <input type="submit" name = "login" value = "Login" class = "btn">
                    <p class="login-link">You don't have any account?<a href="../../falcon_backend/user_login/signup.php">Sign-up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>