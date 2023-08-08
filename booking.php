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
    echo "Connected successfully";
    $dbflag = true;
    //echo $dbflag;  //test line to check var, shows 1 for true
}
if (isset($_POST['booking_day'], $_POST["booking_time"], $_POST['booking_name'],  $_POST['booking_pnumber'])) {
     

    //now do the form code here
    //getting content from html form -> save to php var -> pass to mysql var 
    //var_dump($_POST["booking_day"], $_POST["booking_time"],$_POST["booking_name"], $_POST["booking_pnumber"]); //html fields
    $days = htmlspecialchars($_POST["booking_day"]);
    $hours = htmlspecialchars($_POST["booking_time"]);
    $booking_name = htmlspecialchars($_POST["booking_name"]);
    $booking_pnumber = htmlspecialchars($_POST["booking_pnumber"]);
    
    $query ="INSERT INTO booking (booking_day, booking_time, booking_name, booking_pnumber) VALUES ( '  ".$days." ','  ".$hours." ',' ".$booking_name." ',' ".$booking_pnumber."   ' )";	
    mysqli_query($mysqli, $query); 

}
// Perform your database operations here

// Close the connection
$mysqli->close();
// echo "<p>working</p>"; //testing line to check file is being picked up
?>
