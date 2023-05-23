<?php
require_once '../INCLUDES/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $review = $_POST['review'];
    $rate = $_POST['rate'];

    $sql = "UPDATE `userreviewattraction` as ura 
    INNER JOIN users as u on u.UserID = ura.UserID 
    INNER JOIN attractions as a on a.AttractionID = ura.AttractionID 
    INNER JOIN review as r on r.ReviewID = ura.ReviewID
    SET ura.Status='$type'
    WHERE u.Username ='$username' AND a.Name='$name' AND r.Review='$review' AND r.Rate='$rate'";
    $conn->query($sql);
}

$sql = "SELECT u.Username, a.Name, r.Review, r.Rate, ura.Status FROM `userreviewattraction` as ura 
INNER JOIN users as u on u.UserID = ura.UserID 
INNER JOIN attractions as a on a.AttractionID = ura.AttractionID 
INNER JOIN review as r on r.ReviewID = ura.ReviewID;";
$all_reviews = $conn->query($sql);

echo "<table>";
echo "<tr><th>Username</th><th>Attraction</th><th>Review</th><th>Rate</th><th>Status</th><th></th></tr>";

while ($row = mysqli_fetch_assoc($all_reviews)) {
    echo "<tr>";
    echo "<td class='input'>" . $row['Username'] . "</td>";
    echo "<td class='input'>" . $row['Name'] . "</td>";
    echo "<td class='input'>" . $row['Review'] . "</td>";
    echo "<td class='input'>" . $row['Rate'] . "</td>";
    echo "<td class='input'>" . $row['Status'] . "</td>";
    if ($row['Status'] == 'WAITING') {
        echo "<td><form method='post' class='select'><input type='hidden' name='username' value='" . $row['Username'] . "'><input type='hidden' name='name' value='" . $row['Name'] . "'><input type='hidden' name='review' value='" . $row['Review'] . "'><input type='hidden' name='rate' value='" . $row['Rate'] . "'><select name='type' type='hidden'><option></option><option>WAITING</option><option>ACCEPT</option><option>REJECT</option></select><input type='submit' value='Change'></form></td>";
    }
    echo "</tr>";
}
echo "</table>";
