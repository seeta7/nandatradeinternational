<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password is empty
$dbname = "dealer_db"; // Name of the database created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $email = htmlspecialchars(trim($_POST['email']));

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO dealers (username, contact, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $contact, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Thank you for registering as a dealer, $username!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
<html>
<p><a href="admine">Go to Admin Login Page</a></p>