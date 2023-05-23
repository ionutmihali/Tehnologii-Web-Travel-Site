<?php
include 'header.php';
require_once '../INCLUDES/connection.php';

if (isset($_GET["attraction_id"])) {
    $aid = $_GET["attraction_id"];

    $sql = "SELECT ap.PacketID as PacketID, p.Name AS PackageName, 
GROUP_CONCAT(a.Name SEPARATOR ' + ') AS Attraction,
p.Price AS TotalPrice, p.Discount as Discount
FROM packets as p
INNER JOIN packetsattractions ap ON p.PacketID = ap.PacketID
INNER JOIN Attractions as a ON ap.AttractionID = a.AttractionID
WHERE a.AttractionID = $aid
GROUP BY p.PacketID
ORDER BY (p.Price-p.Discount) DESC;";
} else {
    $sql = "SELECT ap.PacketID as PacketID, p.Name AS PackageName, 
    GROUP_CONCAT(a.Name SEPARATOR ' + ') AS Attraction,
    p.Price AS TotalPrice, p.Discount as Discount
    FROM packets as p
    INNER JOIN packetsattractions ap ON p.PacketID = ap.PacketID
    INNER JOIN Attractions as a ON ap.AttractionID = a.AttractionID
    GROUP BY p.PacketID
    ORDER BY (p.Price-p.Discount) DESC;";
}

$all = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/package.css" />
    <link rel="stylesheet" href="../CSS/error.css" />
</head>

<body>

    <!-- HEADER -->
    <?php
    include_once 'header.php';
    include 'access.php';
    ?>

    <main>
        <?php
        $aux = 0;
        while ($row = mysqli_fetch_assoc($all)) {
            if ($aux < 3) {
                $color = "lightgoldenrodyellow";
                $text = "BEST PRICE!";
            } else {
                $color = "aliceblue";
                $text = "";
            }
        ?>
            <div class="card" style="background-color:<?php echo $color ?>">
                <p style="display: block; font-size: 24px; color: red; text-align: center;"><?php echo $text ?></p>
                <p class="name"> <?php echo $row["PackageName"] ?></p>
                <div class="caption">
                    <div>
                        <p class="name"><?php echo $row["Attraction"] ?></p>
                    </div>
                    <br>
                    <br>
                    <?php
                    if ($row["TotalPrice"] != $row["Discount"]) {
                    ?>
                        <p class="descriere2">Original Price: <?php echo $row["TotalPrice"] ?></p>
                        <p class="descriere">New Price: <?php echo $row["Discount"] ?></p>
                    <?php
                    } else {
                    ?>
                        <p class="descriere">Price: <?php echo $row["Discount"] ?></p>
                    <?php
                    }
                    ?>
                </div>

                <div class="but">
                    <a href="./book.php?packet_id=<?php echo $row["PacketID"] ?>">Book</a>
                </div>
            </div>
        <?php
            $aux++;
        }
        ?>
    </main>

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>
    <script src="../JS/script.tojs"></script>
</body>

</html>