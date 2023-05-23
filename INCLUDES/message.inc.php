<?php
require_once '../INCLUDES/connection.php';

$sql = "SELECT * FROM ask";
$all = $conn->query($sql);

echo "<table>";
echo "<tr><th>Name</th><th>Email</th><th>Message</th></tr>";

while ($row = mysqli_fetch_assoc($all)) {
    echo "<tr>";
    echo "<td class='input'>" . $row['Name'] . "</td>";
    echo "<td class='input'>" . $row['Email'] . "</td>";
    echo "<td class='input'>" . $row['Message'] . "</td>";
    echo "</tr>";
}
echo "</table>";