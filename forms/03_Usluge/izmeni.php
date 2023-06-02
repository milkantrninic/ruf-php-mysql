
<?php


if(isset($_POST['id'])){
				include '../../config.php';
	
				$NAZIV = test_input($_POST['NAZIV']);
                $JMERE = test_input($_POST['JMERE']);
                $PRODCEN = test_input($_POST['PRODCEN']);
                $OPIS = test_input($_POST['OPIS']);
				$id = test_input($_POST['id']);}
				
				function test_input($data) {
								  $data = trim($data);
								  $data = stripslashes($data);
								  $data = htmlspecialchars($data);
								  return $data;
								}
								
//  query to update data 4
 
$query ="UPDATE `MdArt` SET NAZIV='$NAZIV', JMERE='$JMERE', PRODCEN = '$PRODCEN', OPIS = '$OPIS' WHERE SIFRA = '$id'";
$result = mysqli_query($link, $query);	
if($result){
  echo 'data updated';
}

?>
