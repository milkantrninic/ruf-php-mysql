<?php
//connection
include '../../config.php';
//delete
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM MdDob WHERE SIFRA = '".$id."'";
  mysqli_query($link, $query);
 }
}
?>
