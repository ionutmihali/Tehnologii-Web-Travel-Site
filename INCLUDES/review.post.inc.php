<?php
include '../HTML-PHP/header.php';
require_once './connection.php';

if (isset($_GET["aid"])) {
    $aid = $_GET["aid"];
}

if (isset($_POST['submit'])) {
    $review = $_POST['review'];
    $rate = $_POST['rate'];
    $u = $_SESSION["UserID"];


    $sql = "INSERT INTO review (Review, Rate) VALUES ('$review', '$rate')";

    if ($conn->query($sql) === TRUE) {
        $select_query = "SELECT ReviewID FROM review WHERE Review = '$review' AND Rate = '$rate'";
        $result = $conn->query($select_query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $review_id = $row['ReviewID'];

            $insert_query = "INSERT INTO userreviewattraction (UserID, AttractionID, ReviewID) VALUES ('$u', '$aid', '$review_id')";

            if ($conn->query($insert_query) === TRUE) {
                header("Location: ../HTML-PHP/a.php?attraction_id=$aid");
            } else {
                header("Location: ../HTML-PHP/a.php?error=insertreview-error");
                exit();
            }
        }
    } else {
        header("Location: ../HTML-PHP/a.php?error=insertreview-error");
        exit();
    }
}
