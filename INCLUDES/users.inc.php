<?php
require_once '../INCLUDES/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_type = $_POST['type'];
    $username = $_POST['username'];

    $sql = "UPDATE users SET Type='$new_type' WHERE Username='$username'";
    $result = $conn->query($sql);
}

$sql = "SELECT Username, Email, Phone, Type FROM users WHERE Username != 'admin'";
$all_users = $conn->query($sql);

echo "<table>";
echo "<tr><th>Username</th><th>Email</th><th>Phone</th><th>Type</th><th></th></tr>";

while ($row = mysqli_fetch_assoc($all_users)) {
    echo "<tr>";
    echo "<td class='input'>" . $row['Username'] . "</td>";
    echo "<td class='input'>" . $row['Email'] . "</td>";
    echo "<td class='input'>" . $row['Phone'] . "</td>";
    echo "<td class='input'>" . $row['Type'] . "</td>";
    if ($row['Type'] != 'ADMIN') {
        echo "<td><form method='post' class='select'><input type='hidden' name='username' value='" . $row['Username'] . "'><select name='type' type='hidden'><option" . ($row['Type'] == 'USER' ? ' selected' : '') . ">USER</option><option" . ($row['Type'] == 'SUPERVISOR' ? ' selected' : '') . ">SUPERVISOR</option></select><input type='submit' value='Change'></form></td>";
    } else {
        echo "<td></td>";
    }
    echo "</tr>";
}

echo "</table>";

