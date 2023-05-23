<?php
include 'header.php';
require_once '../INCLUDES/connection.php';

if (isset($_GET["packet_id"])) {
    $aid = $_GET["packet_id"];

    $sql = "SELECT * FROM packets WHERE PacketID = '$aid'";
    $all = $conn->query($sql);
}

if (isset($_SESSION["Username"])) {
    $u = $_SESSION["Username"];
    $sql2 = "SELECT Username, Email, Phone FROM users WHERE Username='$u'";
    $all2 = $conn->query($sql2);
}

$sql3 = "SELECT Name FROM packets";
$result = mysqli_query($conn, $sql3);

$places = array();
while ($row3 = mysqli_fetch_assoc($result)) {
    $places[] = $row3['Name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Page</title>

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
    include 'access.php';
    ?>

    <section class="hero">
        <div class="container">
            <p>BOOK YOUR TRIP!</p>
        </div>
    </section>

    <br>

    <?php
    if (isset($_SESSION["Username"])) {
        while ($row2 = mysqli_fetch_assoc($all2)) {
    ?>
            <div class="mydiv">
                <form action="../INCLUDES/book.inc.php" method="post" class="book-form">

                    <?php if (isset($_GET['error'])) { ?>

                        <p class="error">
                            <?php echo $_GET['error']; ?>
                        </p>

                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>

                        <p class="error">
                            <?php echo $_GET['success']; ?>
                        </p>

                    <?php } ?>

                    <div class="flex">
                        <div class="inputbox">
                            <label> Name: </label>
                            <p name="user" class="input_style"><?php echo $row2["Username"] ?></p>
                        </div>
                        <div class="inputbox">
                            <label> Email: </label>
                            <p name="email" class="input_style"><?php echo $row2["Email"] ?></p>
                        </div>
                        <div class="inputbox">
                            <label> Phone: </label>
                            <p name="phone" class="input_style"><?php echo $row2["Phone"] ?></p>
                        </div>

                        <?php
                        if (isset($_GET["packet_id"])) {
                            while ($row = mysqli_fetch_assoc($all)) {
                        ?>
                                <div class="inputbox">
                                    <label> Where to: </label>
                                    <p name="where" class="input_style"><?php echo $row["Name"] ?></p>
                                </div>
                            <?php
                            }
                        } else {
                            ?>

                            <div class="inputbox">
                                <label> Where to: </label>
                                <select class="input_style" name="where">
                                    <?php
                                    foreach ($places as $place) {
                                        echo "<option value=\"$place\">$place</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="inputbox">
                            <label> Number of guests: </label>
                            <input class="input_style" type="text" placeholder="Enter number of guests" name="guests">
                        </div>

                        <div class="inputbox">
                            <label> Arrival: </label>
                            <input class="input_style" type="date" placeholder="Date of arrival" name="arrival">
                        </div>
                        <div class="inputbox">
                            <label> Leaving: </label>
                            <input class="input_style" type="date" placeholder="Date of leaving" name="leaving">
                        </div>
                    </div>

                    <button class="button_style" type="submit" name="submit">Book</button>
                </form>
            </div>

            <br>
        <?php
        }
    } else {
        ?>
        <br>
        <br>

        <div class="mydiv">
            <div class="newdiv">
                <h2>You are not login, you can not book a trip!</h2>
                <a class="button" href="../HTML-PHP/login.php">LOGIN</a>
                <a class="button" href="../HTML-PHP/register.php">REGISTER</a>
            </div>
        </div>

        <br>
        <br>

    <?php
    }
    ?>

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>

    <script src="../JS/script.tojs"></script>
</body>

</html>