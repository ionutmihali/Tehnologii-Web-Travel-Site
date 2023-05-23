<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attraction Page</title>

  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="stylesheet" href="../CSS/style.css" />
  <link rel="stylesheet" href="../CSS/a.css" />
  <link rel="stylesheet" href="../CSS/name.css" />
  <link rel="stylesheet" href="../CSS/login.css" />
  <link rel="stylesheet" href="../CSS/myprofile.css" />
  <link rel="stylesheet" href="../CSS/error.css" />
</head>

<body>
  <!-- HEADER -->
  <?php
  include_once 'header.php';
  include 'access.php';
  require_once '../INCLUDES/connection.php';

  if (isset($_GET["attraction_id"])) {
    $aid = $_GET["attraction_id"];


    $sql = "SELECT * FROM attractions WHERE AttractionID = '$aid'";
    $all = $conn->query($sql);
  } else {
    include 'found.php';
    exit();
  }

  $sql2 = "SELECT u.Username as Username, r.Review as Review, r.Rate as Rate FROM userreviewattraction as ura
INNER JOIN users as u on u.UserID=ura.UserID
INNER JOIN review as r on ura.ReviewID=r.ReviewID
INNER JOIN attractions as a on a.AttractionID=ura.AttractionID
WHERE a.AttractionID = '$aid' and ura.Status='ACCEPT'";
  $all2 = $conn->query($sql2);
  ?>

  <?php while ($row = mysqli_fetch_assoc($all)) { ?>
    <section id="destination_style">
      <div class="card">
        <h2><?php echo $row["Name"] ?></h2>
        <p><?php echo $row["Description"] ?></p>
      </div>

      <br>

      <div class="gallery_style">
        <img src=<?php echo $row["Image"] ?> alt="Image 1">
        <img src=<?php echo $row["Image2"] ?> alt="Image 2">
        <img src=<?php echo $row["Image3"] ?> alt="Image 3">
      </div>

      <button><a href="./packages.php?attraction_id=<?php echo $row["AttractionID"] ?>">See Packages</a></button>
    </section>

    <section id="about_style">
      <div class="card">
        <h2>About <?php echo $row["Name"] ?></h2>
        <p><?php echo $row["Description2"] ?></p>
        <p><?php echo $row["Description3"] ?></p>
      </div>
    </section>
  <?php
  }
  ?>


  <section style="display:flex; align-items:center; justify-content:center;">
    <?php
    while ($row2 = mysqli_fetch_assoc($all2)) { ?>
      <div class="profile-card">
        <br>
        <div class="profile-card__item">
          <h2><?php echo $row2["Username"] ?>:</h2>
          <p><?php echo $row2["Review"] ?></p>
          <p><?php echo $row2["Rate"] ?>/5</p>
        </div>
      </div>
    <?php
    } ?>
  </section>

  <?php if (isset($_SESSION["UserID"])) { ?>
    <br>
    <br>
    <div class="mydiv">
      <form action="../INCLUDES/review.post.inc.php?aid=<?php echo $aid ?>" method="post">

        <?php if (isset($_GET['error'])) { ?>

          <p class="error">
            <?php echo $_GET['error']; ?>
          </p>

        <?php } ?>

        <label>GIVE A REVIEW</label>
        <br>
        <br>

        <label>Review</label>

        <input class="input_style" type="text" name="review" placeholder="Your opinion"><br>

        <label>Rate</label>

        <select name="rate" style="font-size: 16px; background-color: #f5f5f5; border: 1px solid #ccc;">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>

        <br>
        <br>

        <button class="button_style" type="submit" name="submit">Send</button>

      </form>
    </div>
  <?php } ?>

  <br>

  <!-- FOOTER -->
  <?php
  include_once 'footer.php';
  ?>

  <script src="../JS/script.tojs"></script>
</body>

</html>