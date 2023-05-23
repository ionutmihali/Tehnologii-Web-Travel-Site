<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/aboutus.css" />
    <link rel="stylesheet" href="../CSS/but.css" />
    <link rel="stylesheet" href="../CSS/error.css" />
</head>

<body>

    <!-- HEADER -->
    <?php
    include_once 'header.php';
    include './access.php';
    ?>

    <section class="hero">
        <div class="container">
            <p>We are a team of passionate travelers who love to explore new destinations and create unforgettable experiences for our customers.</p>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <br>
            <br>
            <h2>Why Choose Us?</h2>
            <div class="grid">
                <div class="feature">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDhdclunfcqvDXsMC52WKpIRMOkJaLJhYwOw&usqp=CAU" alt="Feature 1 Icon">
                    <h3>Expert Guides</h3>
                    <p>Our guides are experienced professionals who will show you the hidden gems and secret spots that only locals know about.</p>
                </div>
                <div class="feature">
                    <img src="data:image/png;base64,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" alt="Feature 2 Icon">
                    <h3>Flexible Tours</h3>
                    <p>We offer flexible tour options that can be customized to suit your needs and preferences.</p>
                </div>
                <div class="feature">
                    <img src="data:image/png;base64,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" alt="Feature 3 Icon">
                    <h3>Unbeatable Prices</h3>
                    <p>We offer competitive prices without sacrificing quality or comfort.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>

    <script src="../JS/script.tojs"></script>
</body>

</html>