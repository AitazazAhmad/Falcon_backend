<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM `employees` WHERE `id` = ?");
    $stmt->bind_param("i", $id); // Assuming `id` is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("No employee found with the given ID.");
    } else {
        $row = $result->fetch_assoc();
    }
}
?>

<?php
if (isset($_POST['update_employees'])) {
    if (isset($_GET['id'])) {
        $idnew = $_GET['id']; // Use the correct ID from the GET request
    }

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];
    $u_name = $_POST['u_name'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    // Hash the password only if it's not empty
    $hashed_pass = !empty($pass) ? password_hash($pass, PASSWORD_BCRYPT) : $row['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("UPDATE `employees` SET `first_name` = ?, `last_name` = ?, `age` = ?, `user_name` = ?, `password` = ?, `role` = ? WHERE `id` = ?");
    $stmt->bind_param("ssisssi", $f_name, $l_name, $age, $u_name, $hashed_pass, $role, $idnew);

    if ($stmt->execute()) {
        header('Location: index.php?update_msg=You have successfully updated your data');
        exit(); // Always exit after a redirect
    } else {
        die("Query failed: " . $stmt->error);
    }
}
?>

<form action="update_page_1.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo htmlspecialchars($row['first_name']); ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo htmlspecialchars($row['last_name']); ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" value="<?php echo htmlspecialchars($row['age']); ?>">
    </div>
    <div class="form-group">
        <label for="u_name">User  Name</label>
        <input type="text" name="u_name" class="form-control" value="<?php echo htmlspecialchars($row['user_name']); ?>">
    </div>
    <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" name="pass" class="form-control" placeholder="Enter new password">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" name="role" class="form-control" value="<?php echo htmlspecialchars($row['role']); ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_employees" value="Update">
</form>

<?php include('footer.php'); ?>