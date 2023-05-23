<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/name.css" />
    <link rel="stylesheet" href="../CSS/welcome2.css" />
    <link rel="stylesheet" href="../CSS/test.css" />
    <link rel="stylesheet" href="../CSS/but.css" />
    <link rel="stylesheet" href="../CSS/error.css" />
</head>

<body class="mybody">

    <!-- HEADER -->
    <?php
    include_once 'header.php';
    include 'access.php';
    ?>

    <section id="hero">
        <div class="newdiv">
            <h2>explore, travel, relax, enjoy</h2>
            <p>Discover new cultures, try new foods, and create unforgettable memories with our amazing travel packages.</p>
        </div>
    </section>

    <br>
    <br>

    <div class="container_new">
        <div class="profile-card">
            <div class="profile-card__item">
                <a href="./packages.php">Best price</a>
            </div>
            <div class="profile-card__item">
                <a href="./attractions.php">See new places</a>
            </div>
            <div class="profile-card__item">
                <a href="./book.php">Secure your trip plan</a>
            </div>
            <div class="profile-card__item">
                <a href="./aboutus.php">More details</a>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>

    <div class="search-container">
        <form method="post" action="../INCLUDES/search.inc.php" class="search-form">
            <?php if (isset($_GET['error'])) {  ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.querySelector("#search-query").focus();
                    });
                </script>

            <?php } ?>
            <label for="search-query" class="search-label">Search for a destination</label>
            <input type="text" id="search-query" name="search-query" class="search-input">
            <input type="hidden" name="scroll_pos" id="scroll_pos" value="">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>


    <br>
    <br>
    <br>

    <section id="destinations">
        <h2>Popular Destinations</h2>
        <div class="destination-card">
            <img src="https://source.unsplash.com/featured/?paris" alt="Destination Image">
            <h3>Paris, France</h3>
            <p>Visit the iconic Eiffel Tower, take a boat ride on the Seine river, and indulge in French cuisine.</p>
            <div class="profile-card__item">
                <a href="./attractions.php?country=France">View more</a>
            </div>
        </div>
        <div class="destination-card">
            <img src="https://source.unsplash.com/featured/?bali" alt="Destination Image">
            <h3>Bali, Indonesia</h3>
            <p>Relax on the sandy beaches, explore the ancient temples, and immerse yourself in the Balinese culture.</p>
            <div class="profile-card__item">
                <a href="./attractions.php?country=Indonesia">View more</a>
            </div>
        </div>
        <div class="destination-card">
            <img src="https://source.unsplash.com/featured/?banff" alt="Destination Image">
            <h3>Banff National Park, Canada</h3>
            <p>Experience the beauty of the Canadian Rockies, hike the scenic trails, and soak in the natural hot springs.</p>
            <div class="profile-card__item">
                <a href="./attractions.php?country=Canada">View more</a>
            </div>
        </div>
    </section>

    <section>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="../IMAGES/WELCOME/welcome3.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="../IMAGES/WELCOME/welcome2.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="../IMAGES/WELCOME/welcome1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="../IMAGES/WELCOME/welcome4.jpg" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <br>
        <script src="../JS/slideshow.tojs"></script>
    </section>

    <section id="about">
        <h2>About Us</h2>
        <p>We are a team of experienced travel enthusiasts who are passionate about helping people explore the world.</p>
        <p> With our carefully curated travel packages, we aim to provide our customers with unforgettable experiences that they will cherish for a lifetime.</p>
        <div class="profile-card__item">
            <a href="./aboutus.php">More details</a>
        </div>
    </section>

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>

    <script src="../JS/script.tojs"></script>
    <script src="../JS/slider.tojs"></script>
</body>

</html>