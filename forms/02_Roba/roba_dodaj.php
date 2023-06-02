<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Roba"; ?>

 <?php include("../../header_forms.php");?>

<!-- Button trigger modal -->
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>   
     
<!-- Modal -->
 <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
     <div id="myModal" class="modal fade mw-100 p-3" role="dialog">
        <div class="modal-dialog" style="max-width: 75%;">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header d-flex flex-row justify-content-between">
            <h4 class="modal-title">Dodaj novi artikl</h4>
            <button type="button" class="close1"  data-dismiss="modal">&times;</button>
            
          </div>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="modal-body">
            <div class="d-flex flex-row" >
            <div class=" col-lg-6">
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="BARCODE" class="form-control" placeholder="Barcode">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="NAZIV" class="form-control" placeholder="Naziv">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="JMERE" class="form-control" placeholder="KOM">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="TARGR" class="form-control" placeholder="pdv">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="NABCEN" class="form-control" placeholder="Nabavna cijena">
                    </div>
                    </div>
                    <div class="w-100"></div>
               <div class="col-lg-6">
                    
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="PRODCEN" class="form-control" placeholder="Prodajna cijena">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="POPKOL" class="form-control" placeholder="Popust">
                    </div>
                    <br>
                    <div style="margin-bottom:10px;" class="form-group"> 
                        <input type="text" name="ULAZ" class="form-control" placeholder="Ulaz">
                    </div>
                    <br>
                        <div style="margin-bottom:10px;" class="form-group"> 
                            <input type="text" name="IZLAZ" class="form-control" placeholder="Izlaz">
                        </div>
                    <br>
                        <div style="margin-bottom:10px;" class="form-group"> 
                            <input type="text" name="ZALIHA" class="form-control" placeholder="Zaliha">
                        </div>
                    </div>
                   </div>
  
      <div class="modal-footer">
        <input type="Submit"  class="btn btn-primary" value="Sacuvaj" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
      </div>
      </form>
         
        </div>

      </div>
    </div>

 <div class="container d-flex justify-content-around " style="max-width: 100%;">
 <div class="col-lg-11 tcontainer " style="eight:100%; padding-left: 5px; padding-right: 25px;">
<?php 
    if (array_key_exists('NAZIV', $_POST)) {
        
        include '../../config.php';
        
        
       if ($_POST['NAZIV'] == '') {
            
                echo "<p>Naziv je obavezan.</p>";
                
            } 
            else {
            $NAZIV = mysqli_real_escape_string($link, $_POST['NAZIV']);
            $query = "SELECT `SIFRA` FROM `MdArt` WHERE NAZIV = '$NAZIV' AND USLUGA <> 1 ";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<p>To ime već postoji.</p>";
                
            }
                
            
            
            else {
                $BARCODE = mysqli_real_escape_string($link, $_POST['BARCODE']);
                $NAZIV = mysqli_real_escape_string($link, $_POST['NAZIV']);
                $JMERE = mysqli_real_escape_string($link, $_POST['JMERE']);
                $TARGR = mysqli_real_escape_string($link, $_POST['TARGR']);
                $NABCEN = mysqli_real_escape_string($link, $_POST['NABCEN']);
                $PRODCEN = mysqli_real_escape_string($link, $_POST['PRODCEN']);
                $POPKOL = mysqli_real_escape_string($link, $_POST['POPKOL']);
                $ULAZ = mysqli_real_escape_string($link, $_POST['ULAZ']);
                $IZLAZ = mysqli_real_escape_string($link, $_POST['IZLAZ']);
                $ZALIHA = mysqli_real_escape_string($link, $_POST['ZALIHA']);
             
                
            
              $query = "INSERT INTO `MdArt`(`BARCODE`, `NAZIV`, `JMERE`, `TARGR`, `NABCEN`, `PRODCEN`, `POPKOL`, `ULAZ`, `IZLAZ`, `ZALIHA`) 
              VALUES ('$BARCODE', '$NAZIV', '$JMERE', '$TARGR', '$NABCEN', '$PRODCEN', '$POPKOL', '$ULAZ', '$IZLAZ', ' $ZALIHA')";
                    
                     if (mysqli_query($link, $query)) {
                        $sql = "SELECT * FROM MdArt WHERE USLUGA <> 1 ORDER BY SIFRA";
                        $result = $link->query($sql);
                        if(mysqli_num_rows($result) > 0) {?>
                       <table class="table">
						<thead class="thead-dark" style="color:white;">
						  <tr>
						  <th>SIFRA</th>
						  <th>BARKOD</th>
						  <th>NAZIV</th>
						  <th>J.&nbsp;MJERE</th>
						  <th>PDV</th>
						  <th>NABAVNA&nbsp;CIJENA</th>
						  <th>PRODAJNA&nbsp;CIJENA</th>
						  <th>POP.&nbsp;KOL.</th>
						  <th>ULAZ</th>
						  <th>IZLAZ</th>
						  <th>ZALIHA</th>
						  </tr>
						</thead>
						<tbody id="myTable">   
                       <!-- prikazi podatak za svaki red -->
                       <?php while($row = mysqli_fetch_assoc($result)) {echo "<tr><td>" . $row["SIFRA"]. "</td><td>" . $row["BARCODE"]. "</td><td>" . $row["NAZIV"]. "</td><td>". $row["JMERE"]. "</td><td>". $row["TARGR"]. "</td><td>". $row["NABCEN"]. "</td><td>". $row["PRODCEN"]. "</td><td>". $row["POPKOL"]. "</td><td>". $row["ULAZ"]. "</td><td>". $row["IZLAZ"]. "</td><td>". $row["ZALIHA"]. "</td></tr>"; } echo "</tbody></table>"; }
                    
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
     </div>
     </body>
</html>
