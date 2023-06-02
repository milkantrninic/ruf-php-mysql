<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Roba"; ?>

 <?php include("../../header_forms.php");?>
<div class="col-lg-12 d-flex justify-content-around">
 <div class="tcontainer col-lg-11" style="height:100%; width:100%; padding: 0 25px 0 5px;">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold;  font-size: large;">Lista Artikala</h3><br />
   
  <?php
 
       include '../../config.php';
        $sql = "SELECT * FROM MdArt WHERE USLUGA <> 1 ORDER BY SIFRA";
         $result = $link->query($sql);
         if(mysqli_num_rows($result) > 0) { ?>
          <table class="table table-striped">
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
              
              </tr>
            </thead>
            <tbody id="myTable">   
        <!-- prikazi podatak za svaki red -->
         <?php while($row = mysqli_fetch_assoc($result)) {echo "<tr><td>" . $row["SIFRA"]. "</td><td>" . $row["BARCODE"]. "</td><td>" . $row["NAZIV"]. "</td><td>". $row["JMERE"]. "</td><td>". $row["TARGR"]. "</td><td>". $row["NABCEN"]. "</td><td>". $row["PRODCEN"]. "</td><td>". $row["POPKOL"]. "</td><td>". $row["ULAZ"]. "</td><td>". $row["IZLAZ"]. "</td></tr>";
         } echo "</tbody></table>"; }
        else {echo "0 results";}
?>
  </div>
          </div>
 </body>
 
</html>

