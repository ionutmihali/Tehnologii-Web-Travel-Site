<?php
require_once '../INCLUDES/connection.php';

$search_query = $_POST["search-query"];

$sql = "SELECT * FROM attractions WHERE Name LIKE '%$search_query%'";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM attractions WHERE City LIKE '%$search_query%'";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM attractions WHERE Country LIKE '%$search_query%'";
$result3 = $conn->query($sql3);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if ($result->num_rows == 1) {
    $element_id = $row["AttractionID"];
    header("Location: ../HTML-PHP/a.php?attraction_id=$element_id");
  } else {
    $row = $result2->fetch_assoc();
    header("Location: ../HTML-PHP/attractions.php?like=$search_query");
  }
} else if ($result2->num_rows > 0) {
  $row = $result2->fetch_assoc();
  if ($result2->num_rows == 1) {
    $element_id = $row["AttractionID"];
    header("Location: ../HTML-PHP/a.php?attraction_id=$element_id");
  } else {
    $element = $row["City"];
    header("Location: ../HTML-PHP/attractions.php?city=$element");
  }
} else if ($result3->num_rows > 0) {
  $row = $result3->fetch_assoc();
  if ($result3->num_rows == 1) {
    $element_id = $row["AttractionID"];
    header("Location: ../HTML-PHP/a.php?attraction_id=$element_id");
  } else {
    $element = $row["Country"];
    header("Location: ../HTML-PHP/attractions.php?country=$element");
  }
} else {
  header("location: ../HTML-PHP/welcome.php?error=NO%20DESTINATION");
  exit();
}

$conn->close();
