<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attraction Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/login.css" />
    <link rel="stylesheet" href="../CSS/name.css" />
    <link rel="stylesheet" href="../CSS/book.css" />
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
            <p>ADD A NEW ATTRACTION!</p>
        </div>
    </section>

    <br>

    <?php
    if (isset($_SESSION["Username"])) {
    ?>
        <div class="mydiv">
            <form action="../INCLUDES/attraction.post.inc.php" method="post" class="book-form">
                <div class="flex">
                    <div class="inputbox">
                        <label> Name: </label>
                        <input class="input_style" type="text" placeholder="Enter destination name" name="name">
                    </div>
                    <div class="inputbox">
                        <label> City: </label>
                        <input class="input_style" type="text" placeholder="Enter destination name" name="city">
                    </div>
                    <div class="inputbox">
                        <label> Country: </label>
                        <input class="input_style" type="text" placeholder="Enter destination name" name="country">
                    </div>
                    <div class="inputbox">
                        <label> Short Description: </label>
                        <input class="input_style" type="text" placeholder="Enter destination description" name="desciption1">
                    </div>
                    <div class="inputbox">
                        <label> About: </label>
                        <input class="input_style" type="text" placeholder="Enter destination description" name="desciption2">
                    </div>
                    <div class="inputbox">
                        <label> More: </label>
                        <input class="input_style" type="text" placeholder="Enter destination description" name="desciption3">
                    </div>
                    <!-- 
                    <div class="inputbox">
                        <label> Image1: </label>
                        <input class="input_style" type="file" id="photo" name="photo1" accept=".jpg" required>
                    </div>
                    <div class="inputbox">
                        <label> Image2: </label>
                        <input class="input_style" type="file" id="photo" name="photo2" accept=".jpg" required>
                    </div>
                    <div class="inputbox">
                        <label> Image3: </label>
                        <input class="input_style" type="file" id="photo" name="photo3" accept=".jpg" required>
                    </div>
                    -->
                    <div class="inputbox">
                        <label> Image1: </label>
                        <input class="input_style" type="text" placeholder="Enter destination description" name="photo1">
                    </div>
                    <div class="inputbox">
                        <label> Image2: </label>
                        <input class="input_style" type="text" placeholder="Enter destination description" name="photo2">
                    </div>
                    <div class="inputbox">
                        <label> Image3: </label>
                        <input class="input_style" type="text" placeholder="Enter destination description" name="photo3">
                    </div>
                </div>

                <button class="button_style" type="submit" name="submit">Add Attraction</button>
            </form>
        </div>

        <br>
    <?php
    }
    ?>

    <script src="../JS/script.tojs"></script>
</body>

</html>