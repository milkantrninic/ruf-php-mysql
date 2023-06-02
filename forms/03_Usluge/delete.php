<?php
//delete.php
$servername = "localhost";
$username = "thlakta2_thlakta";
$password = "3231klime3132";
$dbname = "thlakta2_racun";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM `MdArt` WHERE SIFRA = '".$id."'";
  mysqli_query($connect, $query);
 }
}
?>
