<?php
session_start();
include 'db_connect.php'; // Ensure your DB connection file is included

// Get user email from session (must be stored during login)
if (isset($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];

    // Delete cart items (example table: cart_items)
    $sql = "DELETE FROM cart_items WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $stmt->close();
}

// Destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logging Out...</title>
  <script>
    // Clear localStorage
    localStorage.clear();

    // Show alert and redirect
    alert("You have been logged out and your cart data has been deleted.");
    window.location.href = "index.php";
  </script>
</head>
<body>
  <p>Logging out...</p>
</body>
</html>
