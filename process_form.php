<?php
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
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$package = $_POST['package'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password=$_POST['password'];

// Prepare SQL query
$sql = "INSERT INTO registrations (name, age, gender, height, weight, package, phone, email, password) 
        VALUES ('$name', '$age', '$gender', '$height', '$weight', '$package', '$phone', '$email','$password')";

// Execute query
if ($conn->query($sql) === TRUE) {
    // Registration successful, redirect to login page
    header("Location: index.html");
    exit(); // Stop further execution of PHP script
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; // Provide error message if registration fails
}

// Close connection
$conn->close();
?>
