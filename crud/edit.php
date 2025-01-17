<?php
include_once("config.php");

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
    $user_data = mysqli_fetch_assoc($result);

    if (!$user_data) {
        echo "User not found.";
        exit();
    }
}

// Check if the form is submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Update query
    mysqli_query($mysqli, "UPDATE users SET name='$name', email='$email', mobile='$mobile' WHERE id=$id");

    // Redirect to homepage
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    <form method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $user_data['name']; ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $user_data['email']; ?>" required></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile" value="<?php echo $user_data['mobile']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $user_data['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>