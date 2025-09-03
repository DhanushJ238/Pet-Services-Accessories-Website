<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $link  = mysqli_real_escape_string($conn, $_POST['product_link']);

    // Insert only if email doesn't exist
    $check = mysqli_query($conn, "SELECT * FROM user_signup WHERE email='$email'");
    if (mysqli_num_rows($check) === 0) {
        $sql = "INSERT INTO user_signup (name, email, phone) VALUES ('$name', '$email', '$phone')";
        if (mysqli_query($conn, $sql)) {
            header("Location: $link");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Email already exists. Please login.'); window.history.back();</script>";
    }

    mysqli_close($conn);
}
?>
