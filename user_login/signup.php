<?php include('signin_header.php') ?>
<?php include('dbcon.php') ?>
    <div class="container">
        <div class="form-box">
            <div class="left-side">
                <h2>Hello friend!</h2>
                <p>Glad to see you! sign up to get started</p>
            </div>
            <div class="right-side">
            <?php
  if(isset($_GET['insert_msg']))
  {
    echo "<h6>" .$_GET['message']. "</h6>";
  }
    ?>
                <form id="signup-form" action="create_data.php" method="post">
                    <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input type="text" id="Name" placeholder="Name" required name="Name">
                    </div>
                    <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="text" id="E_mail" placeholder="E-mail" required name = "E_mail">
                    </div>
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input type="text" id="password" placeholder="Password" required name="password">
                    </div>
                    <!-- <div class="terms">
                        <input type="checkbox" required>
                        <label>I agree to the <a href="#">Terms & Conditions</a></label>
                    </div> -->
                    <input type="submit" class="btn" name="push_data" value="Create Account">
                     <!-- <button type="submit" class="btn" name="create_data">Create Account</button> -->
                    <p class="login-link">Already have an account?<a href="../../falcon_backend/user_login/signin.php">Sign-in</a></p> 
                </form>
            </div>
        </div>
    </div>
</body>

</html>