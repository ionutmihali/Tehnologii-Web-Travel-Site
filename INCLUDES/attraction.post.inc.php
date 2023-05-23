
<?php
include '../HTML-PHP/header.php';
require_once './connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $description1 = $_POST['desciption1'];
    $description2 = $_POST['desciption2'];
    $description3 = $_POST['desciption3'];
    $photo1 = $_POST['photo1'];
    $photo2 = $_POST['photo2'];
    $photo3 = $_POST['photo3'];

    $sql = "INSERT INTO attractions (Name, City, Country, Description, Description2, Description3, Image, Image2, Image3) VALUES ('$name', '$city', '$country', '$description1', '$description2', '$description3', '$photo1', '$photo2', '$photo3')";

    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    else
    {
        header("location: ../HTML-PHP/add_attraction.php");
    }
}
