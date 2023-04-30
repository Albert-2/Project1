<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
  header("location: index.html");
  exit;
}
$booked = false;
$user = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include 'connect.php';
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $time = $_POST["visit"];
  $peoples = $_POST["peoples"];
  $location = $_POST["tour"];
  $description = $_POST["description"];

  $user = $_POST["fname"];

  $sql = "INSERT INTO `booked` (`fname`, `lastName`, `email`, `mobile`, `time`, `peoples`, `location`, `description`) VALUES ('$fname', '$lname', '$email', '$phone', '$time', '$peoples', '$location', '$description')";

  $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/stylesheets/style3.css" />
  <title>Booking.com</title>
</head>

<body>
  <div class="self">
    <div class="left">
      <h3>Hello,<?php
                echo $_SESSION['username']; ?></h3>
    </div>
    <form method="post" class="right" action="logout.php">
      <input type="submit" class="button" value="log out" name="logout">
    </form>
  </div>
  <div class="header">
    <div class="head1">
      <h3>Deals of the Week :</h3>
      <p>Earth Day Special! Up to 50% off</p>
    </div>
    <div class="head2">
      <h3>Deal ends in: 27 Apr,2023</h3>
    </div>
  </div>
  <div class="carousal">
    <ul class="content">
      <li class="list-carousal">
        <img src="https://cdn.tourradar.com/s3/content-pages/391/2048x700/Jk8qlz.jpg" alt="image1" />
      </li>
      <li class="list-carousal">
        <img src="https://cdn.tourradar.com/images/seo-destination-links/asia-desktop.jpg" alt="image2" />
      </li>
      <li class="list-carousal">
        <img src="https://cdn.tourradar.com/images/seo-destination-links/europe-desktop.jpg" alt="image3" />
      </li>
      <li class="list-carousal">
        <img src="https://cdn.tourradar.com/images/seo-destination-links/australia-desktop.jpg" alt="image6" />
      </li>
      <li class="list-carousal">
        <img src="https://cdn.tourradar.com/images/seo-destination-links/africa-desktop.jpg" alt="image7" />
      </li>
    </ul>
  </div>
  </div>
  <div class="book-container">
    <div class="book">
      <div class="book-header">
        <h1>Book A Tour..</h1>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
          corrupti doloremque numquam, iste incidunt asperiores!
        </p>
      </div>
      <div class="book-content">
        <form action="index2.php" method="post">
          <div class="form-left form-part">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" />
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" />
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
            <label for="phone">Phone</label>
            <input type="tel" min="0" maxlength="10" name="phone" id="phone" />
          </div>
          <div class="form-right form-part">
            <label for="visit">When are you planning to visit?</label>
            <input type="date" name="visit" id="visit" />
            <label for="peoples">How many people are in your group?</label>
            <input type="number" name="peoples" id="peoples" min="1" />
            <label for="tour">Your tour?</label>
            <input type="text" name="tour" id="tour" />
          </div>
          <div class="textarea form-part">
            <label for="description">Anything else we should know?</label>
            <textarea name="description" id="description" cols="35" rows="8"></textarea>
            <button type="submit" name="submit" class="book-btn btn">
              Book Now
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>