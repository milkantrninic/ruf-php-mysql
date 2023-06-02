<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Usluge"; ?>

 <?php include("../../header_forms.php");?>
 <div class="container">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold;  font-size: large;">Lista usluga</h3><br />
   
  <?php
 
       include '../../config.php';
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
        else {echo "0 results";}
?>
  </div>
 </body>
</html>

