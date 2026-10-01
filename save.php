<?php

$servername = "localhost";
$username = "website";
$password = "website123";
$database = "mywebsite";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $database
);

if ($conn->connect_error)
{
    die("Database connection failed");
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO messages (name, email, message)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sss", $name, $email, $message);

$stmt->execute();

$stmt->close();
$conn->close();

echo "Message saved successfully!";
?>