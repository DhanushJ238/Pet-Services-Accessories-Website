<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pet Grooming Services</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/banner.css">
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'db_connect.php'; ?> <!-- Reusing your connection file -->

<div class="banner-section text-center">
  <h2 class="sertitle1">Our Pet Grooming Services</h2>
</div>

<div class="services-container">
  <?php
  // Query service data
  $sql = "SELECT * FROM service";
  $result = mysqli_query($conn, $sql);

  // Loop and display each service
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="service">';
          echo '<img src="' . htmlspecialchars($row['img']) . '" alt="' . htmlspecialchars($row['name']) . '">';
          echo '<h3 class="card-title">' . htmlspecialchars($row['name']) . '</h3>';
          echo '<p>Price: ' . htmlspecialchars($row['price']) . '</p>';
          echo '<p>' . htmlspecialchars($row['description']) . '</p>';
          echo '<a class="btn btn-success" href="booking.php?service=' . urlencode(strtolower($row['name'])) . '">Book Now</a>';
          echo '</div>';
      }
  } else {
      echo "<p>No services available right now.</p>";
  }

  mysqli_close($conn);
  ?>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
