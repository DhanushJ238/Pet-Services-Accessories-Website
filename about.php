<?php
include 'header.php';
include 'db_connect.php'; // Make sure this file contains your DB connection

// Fetch branches from database
$query = "SELECT img, name, content FROM about";
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
        <h1>About</h1>
    </div>

    <!-- Branch Cards -->
    <div class="branches-section">
        <div class="container">
            <div class="row g-4">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= htmlspecialchars($row['img']) ?>" class="card-img-top"
                                alt="<?= htmlspecialchars($row['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5><br>
                                <ul class="list-unstyled">
                                    <?php
                                    $items = explode(',', $row['content']);
                                    foreach ($items as $item):
                                        ?>
                                        <li class="d-flex align-items-start mb-2">
                                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                                            <span><?= htmlspecialchars(trim($item)) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>


                                <div class="card-footer d-flex justify-content-between">
                                    <a href="https://maps.google.com" class="btn btn-outline-secondary btn-sm"
                                        target="_blank">Map</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    </div>

    <?php include 'footer.php'; ?>
