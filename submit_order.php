<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pet";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Accept raw POST JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate
if (!is_array($data) || count($data) === 0) {
    echo json_encode(["status" => "error", "message" => "No data received"]);
    exit;
}

$inserted = 0;
$errors = [];

foreach ($data as $item) {
    $user_email = mysqli_real_escape_string($conn, $item['email']);
    $product_name = mysqli_real_escape_string($conn, $item['name']);
    $price = floatval($item['price']);
    $quantity = intval($item['quantity']);
    $subtotal = $price * $quantity;
    $image_url = mysqli_real_escape_string($conn, $item['image']);
    $order_time = date("Y-m-d H:i:s");

    $sql = "INSERT INTO card (user_email, product_name, price, quantity, subtotal, image_url, order_time)
            VALUES ('$user_email', '$product_name', '$price', '$quantity', '$subtotal', '$image_url', '$order_time')";

    if (mysqli_query($conn, $sql)) {
        $inserted++;
    } else {
        $errors[] = mysqli_error($conn);
    }
}

// Response
if ($inserted > 0) {
    echo json_encode(["status" => "success", "message" => "$inserted items inserted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Insert failed", "errors" => $errors]);
}

mysqli_close($conn);
?>
