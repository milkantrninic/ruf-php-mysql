
<?php


if(isset($_POST['id'])){
				include '../../config.php';
	
				$NAZIV = test_input($_POST['NAZIV']);
                $NAZIVPLUS = test_input($_POST['NAZIVPLUS']);
                $ULICA = test_input($_POST['ULICA']);
                $ULICAPLUS = test_input($_POST['ULICAPLUS']);
                $PTT = test_input($_POST['PTT']);
                $MESTO = test_input($_POST['MESTO']);
                $ZIRO = test_input($_POST['ZIRO']);
                $PIB= test_input($_POST['PIB']);
                $PEPDV = test_input($_POST['PEPDV']);
                $TEL = test_input($_POST['TEL']);
                $KONTAKT = test_input( $_POST['KONTAKT']);
                $KD = test_input($_POST['KD']);
                $RABAT = test_input($_POST['RABAT']);
                $MEMO = test_input($_POST['MEMO']);

				$id = test_input($_POST['id']);}
				
				function test_input($data) {
								  $data = trim($data);
								  $data = stripslashes($data);
								  $data = htmlspecialchars($data);
								  return $data;
								}
				
//  query to update data 4
 
$query ="UPDATE `MdDob` 
SET NAZIV='$NAZIV', 
NAZIVPLUS='$NAZIVPLUS', 
ULICA = '$ULICA',
ULICAPLUS = '$ULICAPLUS',
PTT = '$PTT',
MESTO = '$MESTO',
ZIRO = '$ZIRO',
PIB = '$PIB',
PEPDV = '$PEPDV',
TEL = '$TEL',
KONTAKT = '$KONTAKT',
KD = '$KD',
RABAT = '$RABAT', 
MEMO = '$MEMO' 
WHERE SIFRA = '$id'";

$result = mysqli_query($link, $query);	
if($result){
  echo 'data updated';
}

?>
