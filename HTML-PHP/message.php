<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/name.css" />
    <link rel="stylesheet" href="../CSS/users.css" />
    <link rel="stylesheet" href="../CSS/error.css" />
</head>

<body>

    <!-- HEADER -->
    <?php
    include_once 'header.php';
    include 'found_a.php';
    ?>

    <section class="hero">
        <div class="container">
            <p>User's messages</p>
        </div>
    </section>

    <br>
    <br>

    <?php
    require_once '../INCLUDES/message.inc.php';
    ?>

    <br>
    <br>
    <script src="../JS/script.tojs"></script>
</body>

</html>