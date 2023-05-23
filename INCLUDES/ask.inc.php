<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    require_once './connection.php';
    require_once './functions.inc.php';

    if (emptyInputSignup($name, $name, $email, $email, $message) !== false) {
        header("location: ../HTML-PHP/ask.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../HTML-PHP/ask.php?error=invalidemail");
        exit();
    }

    $sql = "INSERT INTO ask (Name, Email, Message) VALUES ('$name', '$email', '$message');";

    if (!mysqli_query($conn, $sql)) {
        header("location: ../HTML-PHP/ask.php?error=queryfailed");
        exit();
    }

    header("location: ../HTML-PHP/ask.php?success");
}
