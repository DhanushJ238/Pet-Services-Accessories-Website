<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pet";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $pet = mysqli_real_escape_string($conn, $_POST['pet']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    $sql = "INSERT INTO booking (name, email, date, pet, service, note) VALUES ('$name', '$email', '$date', '$pet', '$service', '$note')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Login information submitted successfully!'); window.location.href='booking.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
