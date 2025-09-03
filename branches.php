<?php
include 'header.php';
include 'db_connect.php'; // Make sure this file contains your DB connection

// Fetch branches from database
$query = "SELECT name, address, phone, type, time FROM branch";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Our Branches - Paws & Shine</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/banner.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

  <!-- Banner -->
  <div class="banner-section text-center">
    <h1>Our Branches</h1>
  </div>

  <!-- Branch Cards -->
  <div class="branches-section">
    <div class="container">
      <div class="row g-4">

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="img/branch.jpg" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5><br>

              </div>
              <ul class="list-unstyled">
                <li><i class="bi bi-geo-alt-fill text-danger"></i> <?= htmlspecialchars($row['address']) ?></li><br>
                <li><i class="bi bi-telephone-fill text-primary"></i> <?= htmlspecialchars($row['phone']) ?></li><br>
                <li><i class="bi bi-house-fill text-warning"></i> <?= htmlspecialchars($row['type']) ?></li><br>
                <li><i class="bi bi-clock-fill text-success"></i> <?= htmlspecialchars($row['time']) ?></li>
              </ul>
              <div class="card-footer d-flex justify-content-between">
                <a href="https://maps.google.com" class="btn btn-outline-secondary btn-sm" target="_blank">Map</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      </div>
    </div>
  </div>

 <?php include 'footer.php'; ?>
</body>

</html>