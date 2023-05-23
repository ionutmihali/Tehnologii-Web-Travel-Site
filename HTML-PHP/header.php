<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />

</head>

<body>

    <!-- HEADER -->
    <section class="header">
        <?php
        if (isset($_SESSION["Username"]) && $_SESSION["Type"] == 'USER') {
            echo "<a href='./welcome.php' class='logo'>DISCOVER THE WORLD!</a>";
        } else if (isset($_SESSION["Username"]) && $_SESSION["Type"] == 'SUPERVISOR') {
            echo "<a href='./supervisor.php' class='logo'>HELLO, SUPERVISOR!</a>";
        } else if (isset($_SESSION["Username"]) && $_SESSION["Type"] == 'ADMIN') {
            echo "<a href='./admin.php' class='logo'>HELLO, ADMIN!</a>";
        } else {
            echo "<a href='./welcome.php' class='logo'>DISCOVER THE WORLD!</a>";
        }
        ?>

        <nav class="navbar">
            <?php
            if ((!isset($_SESSION["Username"])) || $_SESSION["Type"] == 'USER') {
                echo "<a href='./attractions.php'>Attractions</a>";
                echo "<a href='./packages.php'>Packages</a>";
                echo "<a href='./book.php'>Book</a>";
                echo "<a href='./aboutus.php'>AboutUs</a>";
            }
            if (isset($_SESSION["Username"]) && $_SESSION["Type"] == 'USER') {
                echo "<a class='l' href='./myprofile.php'>My Profile</a>";
                echo "<a class='l' href='./logout.php'>Logout</a>";
                echo "<a></a>";
                echo "<br>";
            } else if (isset($_SESSION["Username"]) && $_SESSION["Type"] == 'SUPERVISOR') {
                echo "<a class='l' href='./supervisor.php'>Supervisor Page</a>";
                echo "<a class='l' href='./logout.php'>Logout</a>";
            } else if (isset($_SESSION["Username"]) && $_SESSION["Type"] == 'ADMIN') {
                echo "<a class='l' href='./admin.php'>Admin Page</a>";
                echo "<a class='l' href='./logout.php'>Logout</a>";
            } else {
                echo "<a class='l' href='./login.php'>Login</a>";
                echo "<a class='l' href='./register.php'>Register</a>";
                echo "<a></a>";
                echo "<br>";
            }
            ?>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>

    <p></p>
    <p></p>
    <p></p>

    <script src="../JS/script.tojs"></script>
</body>

</html>