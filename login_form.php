<?php
session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Enter your MySQL password here
$dbname = "gym_database"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL query to check if the email and password match any record
$sql = "SELECT user_id FROM registrations WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user ID and store in session
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    // Login successful, redirect to gym.html
    header("Location: gym.html");
    exit();
} else {
    echo "Invalid email or password"; // Provide error message if login fails
}

// Close connection
$conn->close();
?>
