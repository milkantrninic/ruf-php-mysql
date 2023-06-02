<?php
//connection
include '../../config.php';

//delete.php
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM MdArt WHERE SIFRA = '".$id."'";
  mysqli_query($link, $query);
 }
}
?>
