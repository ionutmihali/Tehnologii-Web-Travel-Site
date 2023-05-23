<?php

if (isset($_POST["submit"])) {
    $where = $_POST["where"];
    $guests = $_POST["guests"];
    $arrival = $_POST["arrival"];
    $leaving = $_POST["leaving"];

    require_once './connection.php';
    require_once './functions.inc.php';
    require_once '../HTML-PHP/header.php';

    if (emptyInputSignup($where, $where, $guests, $arrival, $leaving) !== false) {
        header("location: ../HTML-PHP/book.php?error=emptyinput:$where,$guests,$leaving,$arrival");
        exit();
    }

    $sql1 = "SELECT PacketID FROM packets WHERE Name='$where'";
    $all = $conn->query($sql1);
    $row1 = mysqli_fetch_assoc($all);
    $value = $row1['PacketID'];

    $sql = "INSERT INTO books (PacketID, Arrival, Leaving, NumberGuests) VALUES ('$value', '$arrival', '$leaving', '$guests')";

    if ($conn->query($sql) === TRUE) {
        $select_query = "SELECT BookID FROM books WHERE PacketID = '$value'";
        $result = $conn->query($select_query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $b_id = $row['BookID'];

            $id = $_SESSION["UserID"];
            $insert_query = "INSERT INTO userbook (UserID, BookID) VALUES ('$id', '$b_id')";

            if ($conn->query($insert_query) === TRUE) {
                header("location: ../HTML-PHP/book.php?success=Book submitted");
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
} else {
    header("location: ../HTML-PHP/book.php");
    exit();
}
