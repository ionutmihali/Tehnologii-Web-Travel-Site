<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    require_once './connection.php';
    require_once './functions.inc.php';

    if (emptyInputLogin($name, $password) !== false) {
        header("location: ../HTML-PHP/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $name, $password);
} else {
    header("location: ../HTML-PHP/login.php");
    exit();
}
