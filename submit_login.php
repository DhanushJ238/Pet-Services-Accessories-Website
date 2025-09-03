<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "pet";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);

    // Generate random user ID
    $user_id = uniqid('user_'); // Generates something like user_648acf3521b9e

    // Insert into table (make sure your DB table has these columns)
    $sql = "INSERT INTO login (user_id, email, password, phone, address, city)
            VALUES ('$user_id', '$email', '$password', '$phone', '$address', '$city')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
        
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
}

mysqli_close($conn);
?>
