<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $link  = mysqli_real_escape_string($conn, $_POST['product_link']);

    $sql = "SELECT * FROM user_signup WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Email exists → allow login
        header("Location: $link");
        exit();
    } else {
        echo "<script>alert('Email not found. Please sign up first.'); window.history.back();</script>";
    }

    mysqli_close($conn);
}
?>
