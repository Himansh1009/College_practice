<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <a href="add.php">Add new user</a><br/><br/>
    <table width="80%" border="1">
        <tr>
            <th>Name</th><th>Mobile</th><th>Email</th><th>Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user_data['name']) . "</td>";
            echo "<td>" . htmlspecialchars($user_data['mobile']) . "</td>";
            echo "<td>" . htmlspecialchars($user_data['email']) . "</td>";
            echo "<td><a href='edit.php?id=" . urlencode($user_data['id']) . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . urlencode($user_data['id']) . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>