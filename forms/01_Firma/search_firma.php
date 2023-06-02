<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Firma"; ?>

 <?php include("../../header_forms.php");?>
<div class="container d-flex justify-content-around">
 <div class="col-lg-11 tcontainer " style="height:100%; padding-left: 5px;">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold;  font-size: large;">Spisak otvorenih Firmii</h3><br />
   
  <?php
 
        include '../../config.php';
        $sql = "SELECT sifra, naziv, mjesto, ulica, kontakt FROM firma ORDER BY sifra";
         $result = $link->query($sql);
         if ($result->num_rows > 0) { ?>
        <table class="table table-striped">
          <thead class="thead-dark" style="color:white;">
            <tr>
            <th>Sifra</th>
            <th>Naziv</th>
            <th>Mjesto</th>
            <th>Ulica</th>
            <th>Kontakt</th>
            </tr>
          </thead>
          <tbody id="myTable">
        <!-- prikazi podatak za svaki red -->
         <?php while($row = $result->fetch_assoc()) {echo "<tr><td>" . $row["sifra"]. "</td><td>" . $row["naziv"]. "</td><td>" . $row["mjesto"]. "</td><td>". $row["ulica"]. "</td><td>". $row["kontakt"]. "</td></tr>";
         } echo "</tbody></table>"; }
        else {echo "0 results";}
?>
  </div>
    </div>
 </body>
 
</html>

