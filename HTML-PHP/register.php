<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/login.css" />
    <link rel="stylesheet" href="../CSS/name.css" />
</head>

<body>
    <!-- HEADER -->
    <?php
    include_once 'header.php';
    ?>

    <section class="hero">
        <div class="container">
            <p>REGISTER</p>
        </div>
    </section>

    <br>

    <!-- REGISTER -->
    <div class="mydiv">
        <form action="../INCLUDES/register.inc.php" method="post">

            <?php if (isset($_GET['error'])) { ?>

                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>

            <?php } ?>

            <label>User Name</label>
            <input class="input_style" type="text" name="name" placeholder="User Name"><br>

            <label>Password</label>
            <input class="input_style" type="password" name="password" placeholder="Password"><br>

            <label>Confirm Password</label>
            <input class="input_style" type="password" name="cpassword" placeholder="Confirm Password"><br>

            <label>Email Address</label>
            <input class="input_style" type="email" name="email" placeholder="Email Address"><br>

            <label>Phone Number</label>
            <input class="input_style" type="phone" name="phone" placeholder="Phone Number"><br>

            <button class="button_style" type="submit" name="submit">Register</button>

        </form>
    </div>

    <br>

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>

    <script src="../JS/script.tojs"></script>
    <script src="../JS/login.tojs"></script>
</body>

</html>