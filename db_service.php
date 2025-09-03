<?php
$host = "localhost";
$username = "root"; // or your DB username
$password = "";     // or your DB password
$dbname = "pet"; // your DB name

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
