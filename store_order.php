<?php
session_start();
header('Content-Type: application/json');

$host = "localhost";
$username = "root";
$password = "";
$dbname = "pet";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed"]);
    exit;
}

$user_email = $_SESSION['user_email'] ?? null;

if (!$user_email) {
    echo json_encode(["status" => "error", "message" => "User not logged in"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['cartItems']) || !is_array($data['cartItems'])) {
    echo json_encode(["status" => "error", "message" => "Invalid cart data"]);
    exit;
}

// Save order
$stmt = $conn->prepare("INSERT INTO orders (user_email, product_name, price, quantity, image) VALUES (?, ?, ?, ?, ?)");

foreach ($data['cartItems'] as $item) {
    $name = $item['name'];
    $price = floatval(preg_replace("/[^\d.]/", "", $item['price']));
    $qty = intval($item['quantity']);
    $image = $item['image'];
    $stmt->bind_param("ssdis", $user_email, $name, $price, $qty, $image);
    $stmt->execute();
}

echo json_encode(["status" => "success", "message" => "Order placed successfully"]);
$conn->close();
?>
