<?php
include '../HTML-PHP/header.php';
require_once './connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $description = $_POST['desciption'];
    $option = $_POST['option'];
    $t = $_POST["type"];

    $sql = "INSERT INTO packets (Name, Price, Discount, Description) VALUES ('$name', '$price', '$discount', '$description')";

    if ($conn->query($sql) === TRUE) {
        $select_query = "SELECT PacketID FROM packets WHERE Name = '$name'";
        $result = $conn->query($select_query);

        $select_query2 = "SELECT AttractionID as A FROM attractions WHERE Name = '$option'";
        $result2 = $conn->query($select_query2);

        if ($result->num_rows > 0 && $result2->num_rows > 0) {
            $row = $result->fetch_assoc();
            $p_id = $row['PacketID'];

            $row2 = $result2->fetch_assoc();
            $a_id = $row2['A'];

            $insert_query = "INSERT INTO packetsattractions (Type, AttractionID, PacketID) VALUES ('$t', '$a_id', '$p_id')";

            if ($conn->query($insert_query) === TRUE) {
                header("location: ../HTML-PHP/add_package.php");
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
                exit();
            }
        } else {
            echo "Error: " . $select_query . "<br>" . mysqli_error($conn);
            echo "Error: " . $select_query2 . "<br>" . mysqli_error($conn);
            exit();
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit();
    }
}
