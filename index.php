<?php
$insert = false;
if (isset($_POST['name'])) {

  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "trip"; // Ensure this matches the actual database name
  $port = 3307; // Specify the custom port number

  // Establish connection with the specified port
  $con = mysqli_connect($server, $username, $password, $dbname, $port);

  if (!$con) {
    die("connection to database failed due to " . mysqli_connect_error());
  }

  $name = $_POST['name'];
  $gender  = $_POST['gender'];
  $age  = $_POST['age'];
  $email = $_POST['email'];
  $phone = $_POST['number'];
  $other = $_POST['desc'];

  $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

  if ($con->query($sql) == true) {
    $insert = true;  // Set insert flag to true
  } else {
    echo "ERROR: $sql <br> $con->error";
  }
  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+CU:wght@100..400&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Form</title>
</head>
<link rel="stylesheet" href="index.css">

<body>
  <img style="width:100% ;position:absolute ; z-index:-1;opacity:0.8; " src="bg-img.jpg" alt="">
  <div class="container">
    <h1 class="title">Welcome to FreeFlowTravels</h1>
    <p class="sub-title">Enter your details to confirm your trip</p>

    <!-- Success message after submission -->
    <?php if ($insert == true): ?>
      <div class="alert alert-success" role="alert">
        Thanks for submitting your response. Great to have you!
      </div>
    <?php endif; ?>

    <form action="index.php" method="post">
      <input type="text" name="name" id="name" placeholder="Enter your name" required>
      <input type="number" name="age" id="age" placeholder="Enter your age" required>
      <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
      <input type="email" name="email" id="email" placeholder="Enter your email" required>
      <input type="tel" name="number" id="number" placeholder="Enter your mobile number" required>
      <textarea name="desc" id="desc" placeholder="Tell me more about yourself" required></textarea>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="view_database.php" class="btn btn-info mt-3">View All Trip Details</a>

  </div>

  <div class="places">
    <div class="card" style="width: 18rem;">
      <img src="img1.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Kerala</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="img2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Goa</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="img3.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Uttarakhand</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>

  <div class="copyright">© copyright FreeFlowTravels</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>