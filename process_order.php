<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "pet";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get user email from session
$user_email = $_SESSION['user_email'];

// Decode order data
$orderData = json_decode($_POST['orderData'], true);

if (empty($orderData)) {
  echo "<script>alert('Cart is empty!'); window.history.back();</script>";
  exit();
}

// Store each item in orders table
foreach ($orderData as $item) {
  $name = mysqli_real_escape_string($conn, $item['name']);
  $price = floatval(preg_replace('/[^\d.]/', '', $item['price']));
  $qty = intval($item['quantity']);
  $total = $price * $qty;

  $sql = "INSERT INTO orders (user_email, product_name, price, quantity, total_price)
          VALUES ('$user_email', '$name', '$price', '$qty', '$total')";

  if (!mysqli_query($conn, $sql)) {
    echo "<script>alert('Failed to store order.'); window.history.back();</script>";
    exit();
  }
}

// Clear cart from localStorage via JS
echo "<script>
  alert('Order placed successfully!');
  localStorage.removeItem('cartItems');
  window.location.href = 'index.php';
</script>";
?>
