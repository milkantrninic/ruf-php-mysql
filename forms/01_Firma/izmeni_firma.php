<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php
include '../../config.php';

if(isset($_POST['id'])){
	
	$naziv = test_input($_POST['naziv']);
	$mjesto = test_input($_POST['mjesto']);
	$ulica = test_input($_POST['ulica']);
	$id = test_input($_POST['id']);}
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
//  query to update data 
	 
$result  = mysqli_query($link, "UPDATE firma SET naziv='$naziv' , mjesto='$mjesto' , ulica = '$ulica' WHERE sifra='$id'");
if($result){
  echo 'data updated';
}

?>
