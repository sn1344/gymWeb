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
// Retrieve user ID from session
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    // Prepare SQL query to fetch user's profile details
    $sql = "SELECT * FROM registrations WHERE user_id = '$user_id'";

    // Execute query
    $result = $conn->query($sql);

    // Check if a matching record is found
    if ($result->num_rows > 0) {
        // Fetch user's profile details
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $age = $row['age'];
        $gender = $row['gender'];
        $height = $row['height'];
        $weight = $row['weight'];
        $package = $row['package'];
        $phone = $row['phone'];
        $email = $row['email'];
    } else {
        // Handle if no matching user found
        echo "No user found with this ID.";
    }
} else {
    echo "User ID is not set in session.";
}


// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <div class="logo">Beast Mode</div>
    </nav>

    <div class="container">
        <h2>User Profile</h2>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Age:</strong> <?php echo $age; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Height:</strong> <?php echo $height; ?> cm</p>
            <p><strong>Weight:</strong> <?php echo $weight; ?> kg</p>
            <p><strong>Package:</strong> <?php echo $package; ?></p>
            <p><strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
        </div>
    </div>

    <footer class="footer">
        <div class="footerText">
            <p>&copy; 2024 Beast Mode. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
