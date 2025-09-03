<?php
session_start();
header('Content-Type: application/json');
include 'db_connect.php';

$data = json_decode(file_get_contents("php://input"), true);

// Check for valid data
if (!isset($data['name'], $data['price'], $data['quantity'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

$product = $data['name'];
$price = $data['price'];
$quantity = $data['quantity'];
$subtotal = $price * $quantity;

// Insert into DB
$stmt = $conn->prepare("INSERT INTO orders (Product, Price, Quantity, Subtotal) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $product, $price, $quantity, $subtotal);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();
