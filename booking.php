<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "booking_database"; // Replace with your database name

// Create a new MySQLi instance
$mysqli = new mysqli($servername, $username, $password, $dbname);
$dbflag = false;

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    $dbflag = true;
}

if (isset($_POST['booking_day'], $_POST["booking_time"], $_POST['booking_name'],  $_POST['booking_pnumber'])) {
    // Getting content from HTML form and saving to PHP variables
    $days = htmlspecialchars($_POST["booking_day"]);
    $hours = htmlspecialchars($_POST["booking_time"]);
    $booking_name = htmlspecialchars($_POST["booking_name"]);
    $booking_pnumber = htmlspecialchars($_POST["booking_pnumber"]);
    
    // Inserting data into the database
    $query = "INSERT INTO booking (booking_day, booking_time, booking_name, booking_pnumber) VALUES ('$days', '$hours', '$booking_name', '$booking_pnumber')";
    if (mysqli_query($mysqli, $query)) {
        // Success! Booking inserted into the database

        // Store the confirmation status in a session variable
        session_start();
        $_SESSION['booking_confirmation'] = true;

        // Redirect back to index.html
        header('Location: index.html');
        exit;
    } else {
        // Handle the case when the database operation fails
        // You can add your own error handling code here
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Close the connection
$mysqli->close();
?>
