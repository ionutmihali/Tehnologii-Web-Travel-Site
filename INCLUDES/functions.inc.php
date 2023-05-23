<?php

function emptyInputSignup($name, $password, $cpassword, $email, $phone)
{
    $result = false;
    if (empty($name) || empty($password) || empty($cpassword) || empty($email) || empty($phone)) {
        $result = true;
    }

    return $result;
}

function invalidUsername($username)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }

    return $result;
}

function invalidPhone($phone)
{
    $result = false;
    if (!preg_match("/^[0-9]{10}+$/", $phone)) {
        $result = true;
    }

    return $result;
}

function passwordMatch($password, $cpassword)
{
    $result = false;
    if ($password !== $cpassword) {
        $result = true;
    }

    return $result;
}

function userExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo mysqli_error(($conn));
        header("location: ../HTML-PHP/register.php error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }
}

function createUser($conn, $username, $password, $email, $phone)
{
    $sql = "INSERT INTO users (Username, Password, Email, Phone) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../HTML-PHP/register.php error=stmtfailed");
        exit();
    }

    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $hasedPassword, $email, $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../HTML-PHP/login.php");
    exit();
}


function emptyInputLogin($name, $password)
{
    $result = false;
    if (empty($name) || empty($password)) {
        $result = true;
    }

    return $result;
}

function loginUser($conn, $name, $password)
{
    $userExists = userExists($conn, $name, $name);

    if ($userExists == false) {
        header("location: ../HTML-PHP/login.php?error=Wrong Username");
        exit();
    }

    $pwdHashed = $userExists["Password"];
    $checkPassword = password_verify($password, $pwdHashed);

    if ($checkPassword == false) {
        header("location: ../HTML-PHP/login.php?error=Wrong Password");
        exit();
    } else if ($checkPassword == true) {
        session_start();
        
        $_SESSION["UserID"] = $userExists["UserID"];
        $_SESSION["Username"] = $userExists["Username"];
        $_SESSION["Type"] = $userExists["Type"];

        if ($_SESSION["Type"] == 'USER')
            header("location: ../HTML-PHP/welcome.php");
        else if ($_SESSION["Type"] == 'ADMIN')
            header("location: ../HTML-PHP/admin.php");
        else if ($_SESSION["Type"] == 'SUPERVISOR')
            header("location: ../HTML-PHP/supervisor.php");
        exit();
    }
}
