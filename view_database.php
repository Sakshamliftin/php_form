<?php
require 'db.php';

$sql = "SELECT * FROM trip ORDER BY sno DESC";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



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
<?php if (count($rows) > 0): ?>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['sno']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['age']) ?></td>
            <td><?= htmlspecialchars($row['gender']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['other']) ?></td>
            <td><?= htmlspecialchars($row['dt']) ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="8">No records found</td>
    </tr>
<?php endif; ?>
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

