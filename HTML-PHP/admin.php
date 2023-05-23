<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/aboutus.css" />
    <link rel="stylesheet" href="../CSS/name.css" />
    <link rel="stylesheet" href="../CSS/admin.css" />
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
            <p>ADMIN PAGE</p>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <br>
            <br>
            <div class="grid">
                <div class="feature">
                    <img src="https://static.vecteezy.com/system/resources/previews/008/302/513/original/eps10-blue-user-icon-or-logo-in-simple-flat-trendy-modern-style-isolated-on-white-background-free-vector.jpg" alt="Feature 1 Icon">
                    <div>
                        <a href="./users.php" class="newa">Users Table</a>
                    </div>
                    <p>See, edit the role and delete account of an user.</p>
                </div>
                <div class="feature" href="./reviews.php">
                    <img src="https://www.kindpng.com/picc/m/79-797418_reviews-icon-reviews-icon-hd-png-download.png" alt="Feature 2 Icon">
                    <div>
                        <a href="./review.php" class="newa">Reviews List</a>
                    </div>
                    <p>Read, accept or reject the review of users.</p>
                </div>
                <div class="feature" href="./add_attraction.php">
                    <img src="https://simg.nicepng.com/png/small/9-94335_location-icon-location-icon-png-blue.png" alt="Feature 2 Icon">
                    <div>
                        <a href="./add_attraction.php" class="newa">New Attraction</a>
                    </div>
                    <p>Introduce new attractions.</p>
                </div>
                <div class="feature" href="./add_package.php">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdFH33GgrAJBVWkK04w-wuKs5gKSGU3dmIKcU0vbjwULEBCIsQrnuADzM9WlMd8ZNcFhQ&usqp=CAU" alt="Feature 2 Icon">
                    <div>
                        <a href="./add_package.php" class="newa">New Package</a>
                    </div>
                    <p>Introduce new packages.</p>
                </div>
                <div class="feature" href="./message.php">
                    <img src="https://m-cdn.phonearena.com/images/articles/394349-image/micon.jpg" alt="Feature 2 Icon">
                    <div>
                        <a href="./message.php" class="newa">Message List</a>
                    </div>
                    <p>Read messages from users.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="../JS/script.tojs"></script>
</body>

</html>