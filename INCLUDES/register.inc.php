<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    require_once './connection.php';
    require_once './functions.inc.php';

    if (emptyInputSignup($name, $password, $cpassword, $email, $phone) !== false) {
        header("location: ../HTML-PHP/register.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($name) !== false) {
        header("location: ../HTML-PHP/register.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../HTML-PHP/register.php?error=invalidemail");
        exit();
    }

    if (invalidPhone($phone) !== false) {
        header("location: ../HTML-PHP/register.php?error=invalidphone");
        exit();
    }

    if (passwordMatch($password, $cpassword) !== false) {
        header("location: ../HTML-PHP/register.php?error=passwordsdontmatch");
        exit();
    }

    if (userExists($conn, $name, $email) == false) {
        header("location: ../HTML-PHP/register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $password, $email, $phone);
} else {
    header("location: ../HTML-PHP/login.php");
    exit();
}
