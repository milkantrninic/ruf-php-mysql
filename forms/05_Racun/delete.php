<?php


// Create connection
include '../../config.php';
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM firma WHERE sifra = '".$id."'";
  mysqli_query($link, $query);
 }
}
?>
