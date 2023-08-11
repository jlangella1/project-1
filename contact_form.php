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

if (isset($_POST['contact_name'], $_POST["contact_email"], $_POST['contact_message'])) 
    // Getting content from HTML form and saving to PHP variables
    $bname = htmlspecialchars($_POST["contact_name"]);
    $bemail = htmlspecialchars($_POST["contact_email"]);
    $bmessage = htmlspecialchars($_POST["contact_message"]);
    
    // Inserting data into the database
    $query = "INSERT INTO contact (bname, bemail, bmessage) VALUES ('$bname', '$bemail', '$bmessage')";
    if (mysqli_query($mysqli, $query)) {
        // Success! Booking inserted into the database

        // Store the confirmation status in a session variable
        session_start();
        $_SESSION['booking_confirmation'] = true;

        // Redirect back to contact.html
        header('Location: index.html');
        exit;

}

// Close the connection
$mysqli->close();
?>
