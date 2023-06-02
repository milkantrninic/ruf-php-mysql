<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Kupci"; ?>

<?php include("../../header_forms.php");?>

<!-- Button trigger modal -->
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#exampleModal').modal('show');
    });
</script>   
     
<!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj uslugu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
<div id="fi02"></div>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="modal-body">
            
                   
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="NAZIV" class="form-control" placeholder="Naziv">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="NAZIVPLUS" class="form-control" placeholder="Naziv 2">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="ULICA" class="form-control" placeholder="Ulica">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="ULICAPLUS" class="form-control" placeholder="Ulica 2">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="PTT" class="form-control" placeholder="PTT">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="MESTO" class="form-control" placeholder="Mjesto">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="ZIRO" class="form-control" placeholder="Žiro račun">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="PIB" class="form-control" placeholder="PIB">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="PEPDV" class="form-control" placeholder="Jib">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="TEL" class="form-control" placeholder="Telefon">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="KONTAKT" class="form-control" placeholder="Kontakt">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="KD" class="form-control" placeholder="Kontakt 2">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="RABAT" class="form-control" placeholder="Rabat">
                    </div>
                    <br>
					<div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="MEMO" class="form-control" placeholder="Zabilješka">
                    </div>
                    <br>
					
                    
  
      <div class="modal-footer">
        <input type="Submit"  class="btn btn-primary" value="Sacuvaj" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container" style="margin-top:50px;">

<?php 
    if (array_key_exists('NAZIV', $_POST)) {
        
        
        
        
       if ($_POST['NAZIV'] == '') {
            
                echo "<p>Naziv je obavezan.</p>";
                
            }   
            else {
            $NAZIV = mysqli_real_escape_string($link, $_POST['NAZIV']);
            $query = "SELECT `SIFRA` FROM `MdDob` WHERE NAZIV = '$NAZIV'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<p>To ime već postoji.</p>";
                
            }
                
            
            
            else {
                $SIFRA = mysqli_real_escape_string($link, $_POST['SIFRA']);
                $NAZIV = mysqli_real_escape_string($link, $_POST['NAZIV']);
                $NAZIVPLUS = mysqli_real_escape_string($link, $_POST['NAZIVPLUS']);
				$ULICA = mysqli_real_escape_string($link, $_POST['ULICA']);
                $ULICAPLUS = mysqli_real_escape_string($link, $_POST['ULICAPLUS']);
                $PTT  = mysqli_real_escape_string($link, $_POST['PTT']);
                $MESTO = mysqli_real_escape_string($link, $_POST['MESTO']);
                $ZIRO = mysqli_real_escape_string($link, $_POST['ZIRO']);
                $PIB = mysqli_real_escape_string($link, $_POST['PIB']);
                $PEPDV = mysqli_real_escape_string($link, $_POST['PEPDV']);
                $TEL = mysqli_real_escape_string($link, $_POST['TEL']);
                $KONTAKT = mysqli_real_escape_string($link, $_POST['KONTAKT']);
                $KD = mysqli_real_escape_string($link, $_POST['KD']);
                $RABAT = mysqli_real_escape_string($link, $_POST['RABAT']);
                $MEMO = mysqli_real_escape_string($link, $_POST['MEMO']);
              
                
            
              $query = "INSERT INTO `MdDob`(`NAZIV`, `NAZIVPLUS`, `ULICA`, `ULICAPLUS`, `PTT`, `MESTO`, `ZIRO`, `PIB`, `PEPDV`, `TEL`, `KONTAKT`, `KD`, `RABAT`, `MEMO`) 
              VALUES ('$NAZIV', '$NAZIVPLUS', '$ULICA', '$ULICAPLUS', '$PTT', '$MESTO', '$ZIRO', '$PIB', '$PEPDV', ' $TEL', '$KONTAKT', '$KD', '$RABAT', '$MEMO')";
                    
                     if (mysqli_query($link, $query)) {
                       
						$sql = "SELECT * FROM MdDob ORDER BY SIFRA";
						 $result = $link->query($sql);
						if(mysqli_num_rows($result) > 0) { ?>
						<table class="table">
						  <thead class="thead-dark" style="color:white;">
							<tr>
							  <th>SIFRA</th>
							  <th>NAZIV</th>
							  <th>NAZIV&nbsp;2</th>
							  <th>ULICA</th>
							  <th>ULICA&nbsp;2</th>
							  <th>PTT</th>
							  <th>MESTO</th>
							  <th>ZIRO</th>
							  <th>PIB</th>
							  <th>PEPDV</th>
							  <th>TEL</th>
							  <th>KONTAKT</th>
							  <th>KONTAKT&nbsp;2</th>
							  <th>RABAT</th>
							  <th>MEMO</th>
							</tr>
						  </thead>
						  <tbody id="myTable">
        <!-- prikazi podatak za svaki red -->
         <?php while($row = mysqli_fetch_assoc($result)) {echo "<tr><td>" . $row["SIFRA"]. "</td><td>" . $row["NAZIV"]. "</td><td>" . $row["NAZIVPLUS"]. "</td><td>". $row["ULICA"]. "</td><td>". $row["ULICAPLUS"]. "</td><td>".$row["PTT"]. "</td><td>".$row["MESTO"]. "</td><td>".$row["ZIRO"]. "</td><td>".$row["PIB"]. "</td><td>".$row["PEPDV"]. "</td><td>".$row["TEL"]. "</td><td>".$row["KONTAKT"]. "</td><td>".$row["KD"]. "</td><td>".$row["RABAT"]. "</td><td>".$row["MEMO"]. "</td></tr>";
         } echo "</tbody></table>"; }
		 else {
    echo "0 results";
}
                        
                    } else {
                    
                        echo "<p>Došlo je do problema sa unosom podataka. Pokušajte ponovo</p>";
                        
                    }
                    
                }
                
            }
    } ?>
    </div>
     </body>
</html>
