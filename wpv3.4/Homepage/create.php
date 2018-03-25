<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intelbox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE e_sub5 (
jan DOUBLE, 
feb DOUBLE,
mar DOUBLE,	
apr DOUBLE,
may DOUBLE,
email TEXT,
rollno INT(11)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>