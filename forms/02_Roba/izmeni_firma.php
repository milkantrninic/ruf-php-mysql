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
	
								$BARCODE = test_input($_POST['BARCODE']);
								$NAZIV = test_input($_POST['NAZIV']);
								$JMERE = test_input($_POST['JMERE']);
								$TARGR = test_input($_POST['TARGR']);
								$NABCEN = test_input($_POST['NABCEN']);
								$PRODCEN = test_input($_POST['PRODCEN']);
								$POPKOL = test_input($_POST['POPKOL']);
								$ULAZ = test_input($_POST['ULAZ']);
								$IZLAZ = test_input($_POST['IZLAZ']);
								$ZALIHA = test_input($_POST['ZALIHA']);
								$id = test_input($_POST['id']);}
								
								function test_input($data) {
								  $data = trim($data);
								  $data = stripslashes($data);
								  $data = htmlspecialchars($data);
								  return $data;
								}
								
//  query to update data 10
	 
$result  = mysqli_query($link, "UPDATE MdArt SET 
								BARCODE='$BARCODE' , 
								NAZIV='$NAZIV', 
								JMERE = '$JMERE', 
								TARGR = '$TARGR',
								NABCEN = '$NABCEN',
								PRODCEN = '$PRODCEN',
								POPKOL = '$POPKOL',
								ULAZ = '$ULAZ',
								IZLAZ = '$IZLAZ',
								ZALIHA = '$ZALIHA'
								WHERE SIFRA='$id'");
if($result){
  echo 'data updated';
}

?>
