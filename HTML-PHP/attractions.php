<?php
include 'header.php';
require_once '../INCLUDES/connection.php';

if (isset($_GET["country"])) {
    $c = $_GET["country"];
    $sql = "SELECT a.*, AVG(r.Rate) AS AverageRating
    FROM attractions AS a
    LEFT JOIN userreviewattraction AS ura ON a.AttractionID = ura.AttractionID
    LEFT JOIN review AS r ON ura.ReviewID = r.ReviewID
    WHERE Country='$c'
    GROUP BY a.AttractionID
    ORDER BY AverageRating DESC;";
} else if (isset($_GET["city"])) {
    $c = $_GET["city"];
    $sql = "SELECT a.*, AVG(r.Rate) AS AverageRating
    FROM attractions AS a
    LEFT JOIN userreviewattraction AS ura ON a.AttractionID = ura.AttractionID
    LEFT JOIN review AS r ON ura.ReviewID = r.ReviewID
    WHERE a.City='$c'
    GROUP BY a.AttractionID
    ORDER BY AverageRating DESC;";
} else if (isset($_GET["like"])) {
    $c = $_GET["like"];
    $sql = "SELECT a.*, AVG(r.Rate) AS AverageRating
    FROM attractions AS a
    LEFT JOIN userreviewattraction AS ura ON a.AttractionID = ura.AttractionID
    LEFT JOIN review AS r ON ura.ReviewID = r.ReviewID
    WHERE a.Name LIKE '%$c%'
    GROUP BY a.AttractionID
    ORDER BY AverageRating DESC;";
} else {
    $sql = "SELECT a.*, AVG(r.Rate) AS AverageRating
    FROM attractions AS a
    LEFT JOIN userreviewattraction AS ura ON a.AttractionID = ura.AttractionID
    LEFT JOIN review AS r ON ura.ReviewID = r.ReviewID
    GROUP BY a.AttractionID
    ORDER BY AverageRating DESC;";
}

$all_attractions = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractions Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/attractions.css" />
    <link rel="stylesheet" href="../CSS/but.css" />
    <link rel="stylesheet" href="../CSS/error.css" />
</head>

<body>

    <!-- HEADER -->
    <?php
    include_once 'header.php';
    include 'access.php';
    ?>

    <!-- ATTRACTIONS -->
    <main>
        <?php
        $aux = 0;
        while ($row = mysqli_fetch_assoc($all_attractions)) {
            $attraction_id = $row["AttractionID"];
            $sql3 = "SELECT AVG(r.Rate) AS AVG FROM userreviewattraction ura 
            INNER JOIN review r ON ura.ReviewID = r.ReviewID 
            WHERE ura.AttractionID='$attraction_id';";
            $result = $conn->query($sql3);
            $row2 = mysqli_fetch_assoc($result);
            $avg_rating = $row2['AVG'];
        ?>
            <div class="card" style="align-items:center;">
                <div class="image">
                    <img src="<?php echo $row["Image"] ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                        <?php
                        if ($aux < 4) {
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= round($avg_rating)) {
                                    echo '<i class="fas fa-star" style="color: gold;"></i>';
                                } else {
                                    echo '<i class="far fa-star grey"></i>';
                                }
                            }
                            $aux++;
                        } else {
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= round($avg_rating)) {
                                    echo '<i class="fas fa-star"></i>';
                                } else {
                                    echo '<i class="far fa-star grey"></i>';
                                }
                            }
                            $aux++;
                        }
                        ?>
                    </p>
                    <p class="name"><?php echo $row["Name"] ?></p>
                    <p class="descriere"><?php echo $row["Description"] ?></p>
                </div>
                <br>
                <div class="but">
                    <a href="./a.php?attraction_id=<?php echo $row["AttractionID"] ?>">See More</a>
                </div>
            </div>
        <?php
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