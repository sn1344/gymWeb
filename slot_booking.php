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

// Retrieve user ID from session
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    // Retrieve form data
    $date = $_POST['date'];
    $time_slot = $_POST['time'];

    // Prepare SQL query
    // Prepare SQL query
$sql = "INSERT INTO slot_booking (user_id, date, time_slot) 
VALUES ('$user_id', '$date', '$time_slot')";


    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Slot booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Provide error message if booking fails
    }
} else {
    echo "User ID is not set in session.";
}

// Close connection
$conn->close();
?>
