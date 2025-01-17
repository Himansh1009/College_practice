<!DOCTYPE html>
<html>
<head>
    <title>Add Users</title>
</head>
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['Submit'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $mobile = trim($_POST['mobile']);

        // Include the database configuration file
        include_once("config.php");

        // Server-side validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
        } elseif (!is_numeric($mobile)) {
            echo "Mobile number must be numeric.";
        } else {
            // Escape special characters to prevent SQL injection
            $name = mysqli_real_escape_string($mysqli, $name);
            $email = mysqli_real_escape_string($mysqli, $email);
            $mobile = mysqli_real_escape_string($mysqli, $mobile);

            // Insert the data into the database
            $result = mysqli_query($mysqli, "INSERT INTO users(name, email, mobile) VALUES ('$name', '$email', '$mobile')");

            if ($result) {
                echo "User added successfully. <a href='index.php'>View Users</a>";
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        }
    }
    ?>
</body>
</html>