<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/name.css" />
    <link rel="stylesheet" href="../CSS/login.css" />
    <link rel="stylesheet" href="../CSS/myprofile.css" />
    <link rel="stylesheet" href="../CSS/error.css" />
</head>

<body>

    <!-- HEADER -->
    <?php
    include_once 'header.php';
    include 'found_u.php';
    require_once '../INCLUDES/connection.php';
    require_once '../INCLUDES/functions.inc.php';

    $u = $_SESSION["Username"];

    if (isset($_POST['submit']) && isset($_POST['new_username']) && isset($_POST['new_email']) && isset($_POST['new_phone'])) {

        $newUsername = $_POST['new_username'];
        $newEmail = $_POST['new_email'];
        $newPhone = $_POST['new_phone'];

        $userExists = userExists($conn, $newUsername, $newUsername);

        if ($userExists == true) {
            header("location: ../HTML-PHP/myprofile.php?error=usernameexists");
            exit();
        }

        $updateSql = "UPDATE users SET Username='$newUsername', Email='$newEmail', Phone='$newPhone' WHERE Username='$u'";
        if ($conn->query($updateSql) === TRUE) {
            $_SESSION["Username"] = $newUsername;
        } else {
            echo "Error updating record: ";
        }
    }

    $u = $_SESSION["Username"];

    $sql = "SELECT Username, Email, Phone, Type FROM users WHERE Username = '$u'";
    $all = $conn->query($sql);

    $sql2 = "SELECT a.Name as Name, ura.Status as Status, r.Review as Review, r.Rate as Rate FROM userreviewattraction as ura
INNER JOIN attractions as a on a.AttractionID=ura.AttractionID
INNER JOIN users as u on ura.UserID=u.UserID
INNER JOIN review as r on r.ReviewID = ura.ReviewID
WHERE u.Username = '$u'";
    $all2 = $conn->query($sql2);

    $sql3 = "SELECT p.Name as Name, p.Discount*(b.Leaving-b.Arrival) as Cost, b.Arrival as Arrival, b.Leaving as Leaving FROM userbook as ub
INNER JOIN users as u on ub.UserID=u.UserID
INNER JOIN books as b on ub.BookID=b.BookID
INNER JOIN packets as p on p.PacketID=b.PacketID
WHERE u.Username = '$u'";
    $all3 = $conn->query($sql3);
    ?>

    <section class="hero">
        <div class="container">
            <p>MY PROFILE</p>
        </div>
    </section>

    <br>
    <br>

    <form class="container_new" method="POST">
        <h1 class="heading">Credentials</h1>
        <div class="profile-card">
            <?php while ($row = mysqli_fetch_assoc($all)) { ?>
                <div class="profile-card__item">
                    <h2>Username</h2>
                    <input name="new_username" value="<?php echo $row["Username"] ?>"></input>
                </div>
                <div class="profile-card__item">
                    <h2>Email</h2>
                    <input name="new_email" value="<?php echo $row["Email"] ?>"></input>
                </div>
                <div class="profile-card__item">
                    <h2>Phone</h2>
                    <input name="new_phone" value="<?php echo $row["Phone"] ?>"></input>
                </div>
                <div class="profile-card__item">
                    <h2>Type</h2>
                    <p value><?php echo $row["Type"] ?></p>
                </div>

                <button class="button_style" type="submit" name="submit" href=".">Edit</button>
            <?php } ?>
        </div>
    </form>

    <br>
    <br>

    <div class="container_new">
        <h1 class="heading">Your books</h1>
        <div class="profile-card">
            <?php while ($row3 = mysqli_fetch_assoc($all3)) { ?>
                <div class="profile-card__item">
                    <h2><?php echo $row3["Name"] ?></h2>
                    <p>Cost: <?php echo $row3["Cost"] ?></p>
                    <p>From: <?php echo $row3["Arrival"] ?></p>
                    <p>To: <?php echo $row3["Leaving"] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <br>
    <br>

    <div class="container_new">
        <h1 class="heading">Your reviews</h1>
        <div class="profile-card">
            <?php while ($row2 = mysqli_fetch_assoc($all2)) { ?>
                <div class="profile-card__item">
                    <h2><?php echo $row2["Name"] ?></h2>
                    <p><?php echo $row2["Review"] ?></p>
                    <p><?php echo $row2["Rate"] ?>/5</p>
                    <h2><?php echo $row2["Status"] ?></h2>
                </div>
            <?php } ?>
        </div>
    </div>

    <br>
    <br>

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>

    <script src="../JS/script.tojs"></script>
</body>

</html>