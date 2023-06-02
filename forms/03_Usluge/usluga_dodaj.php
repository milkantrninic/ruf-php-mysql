<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Usluge"; ?>

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
                        <input type="text" name="JMERE" class="form-control" placeholder="Jedinica mjere" value="KOM">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="PRODCEN" class="form-control" placeholder="Cijena usluge">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="OPIS" class="form-control" placeholder="Opis">
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
        
        include '../../config.php';
        
        
       if ($_POST['NAZIV'] == '') {
            
                echo "<p>Naziv je obavezan.</p>";
                
            } 
            else {
            $NAZIV = mysqli_real_escape_string($link, $_POST['NAZIV']);
            $query = "SELECT `SIFRA` FROM `MdArt` WHERE NAZIV = '$NAZIV'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<p>To ime već postoji.</p>";
                
            }
                
            
            
            else {
                $NAZIV = mysqli_real_escape_string($link, $_POST['NAZIV']);
                $JMERE = mysqli_real_escape_string($link, $_POST['JMERE']);
                $PRODCEN= mysqli_real_escape_string($link, $_POST['PRODCEN']);
                $OPIS = mysqli_real_escape_string($link, $_POST['OPIS']);
                $USLUGA = 1;
                
              $query = "INSERT INTO `MdArt`(`NAZIV`, `JMERE`, `PRODCEN`, `OPIS`, `USLUGA`) 
              VALUES ('$NAZIV', '$JMERE', '$PRODCEN', '$OPIS', '$USLUGA')";
                    
                     if (mysqli_query($link, $query)) {
                         $sql = "SELECT SIFRA, BARCODE, NAZIV, JMERE, TARGR, NABCEN, PRODCEN, POPKOL, ULAZ, IZLAZ, ZALIHA, OPIS FROM MdArt WHERE USLUGA = 1 ORDER BY SIFRA";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {?>
                        <table class="table">
							<thead class="thead-dark" style="color:white;">
							  <tr>
							  <th>Sifra</th>
							  <th>Naziv</th>
							  <th>Jedinica mjere</th>
							  <th>Cijena usluge</th>
							  <th>Opis</th>
							  </tr>
							</thead>
              <tbody id="myTable">   
                        <!-- prikazi podatak za svaki red -->
						 <?php while($row = $result->fetch_assoc()) {echo "<tr><td>" . $row["SIFRA"]. "</td><td>" . $row["NAZIV"]. "</td><td>" . $row["JMERE"]. "</td><td>". $row["PRODCEN"]. "</td><td>". $row["OPIS"]. "</td></tr>";
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
