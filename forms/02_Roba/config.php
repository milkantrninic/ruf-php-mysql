
<?php
$servername = "localhost";
$username = "thlakta2_thlakta";
$password = "3231klime3132";
$dbname = "thlakta2_racun";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
?>
