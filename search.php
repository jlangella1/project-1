<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "booking_database"; // Replace with your database name

// Create a new MySQLi instance
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Connected successfully";
    
}

//above is working
//search below
if (isset($_POST['booking_day'])) {
     
    //now do the form code here
    //getting content from html form -> save to php var -> pass to mysql var 
   // var_dump($_POST["booking_day"]); //html fields
    $days = htmlspecialchars($_POST["booking_day"]);
    
    
    $query = "SELECT * from booking where booking_day LIKE '  ".$days."  ' ";	
    mysqli_query($mysqli, $query); 
    //take the result of the query and pass to a var, then pass to table on html page

}

// Close the connection
$mysqli->close();
// echo "<p>working</p>"; //testing line to check file is being picked up
?>
