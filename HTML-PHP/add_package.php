<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package Page</title>

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
            <p>ADD A NEW PACKAGE!</p>
        </div>
    </section>

    <br>

    <?php
    if (isset($_SESSION["Username"])) {
    ?>
        <div class="mydiv">
            <form action="../INCLUDES/package.post.inc.php" method="post" class="book-form">
                <div class="flex">
                    <div class="inputbox">
                        <label> Name: </label>
                        <input class="input_style" type="text" placeholder="Enter destination name" name="name">
                    </div>
                    <div class="inputbox">
                        <label> Type: </label>
                        <select name="type" style="font-size: 16px; background-color: #f5f5f5; border: 1px solid #ccc;">
                            <option value="ALL INCLUSIVE">ALL INCLUSIVE</option>
                            <option value="ONLY FLIGHT">ONLY FLIGHT</option>
                            <option value="ONLY BREAKFAST">ONLY BREAKFAST</option>
                        </select>
                    </div>
                    <br>
                    <div class="inputbox">
                        <label> Price: </label>
                        <input class="input_style" type="text" placeholder="Enter destination price" name="price">
                    </div>
                    <div class="inputbox">
                        <label> Discount: </label>
                        <input class="input_style" type="text" placeholder="Enter destination discount" name="discount">
                    </div>
                    <div class="inputbox">
                        <label> Description: </label>
                        <input class="input_style" type="text" placeholder="Enter destination description" name="desciption">
                    </div>
                </div>

                <div class="inputbox">
                    <label>Attractions:</label>
                    <select class="input_style" name="option" multiple>
                        <?php
                        include './header.php';
                        require_once '../INCLUDES/connection.php';
                        $attractions_query = "SELECT * FROM attractions";
                        $attractions_result = mysqli_query($conn, $attractions_query);

                        while ($row = mysqli_fetch_assoc($attractions_result)) {
                            echo "<option name='opt' value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <button class="button_style" type="submit" name="submit" href="#">Add Package</button>
            </form>
        </div>

        <br>
    <?php
    }
    ?>

    <script src="../JS/script.tojs"></script>
</body>

</html>