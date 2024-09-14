<?php
// Database connection details
$server = "localhost";
$username = "root";
$password = "";
$dbname = "trip"; // Your database name
$port = 3307; // Port number

// Create connection
$con = mysqli_connect($server, $username, $password, $dbname, $port);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch all data from the `trip` table
$sql = "SELECT * FROM `trip`";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Database</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="title">Trip Details</h1>

    <!-- Table to display data -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Description</th>
          <th>Date Submitted</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Check if there are rows in the result
        if ($result->num_rows > 0) {
          // Loop through the rows and display data
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                                <td>{$row['sno']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['age']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['other']}</td>
                                <td>{$row['dt']}</td>
                              </tr>";
          }
        } else {
          echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Close the connection
$con->close();
?>