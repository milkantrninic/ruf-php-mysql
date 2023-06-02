<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Kupci"; ?>
<?php include("../../header_forms.php");?>



 <div class="container">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold;  font-size: large;">Spisak kupaca</h3><br />
   
  <?php
 
        include '../../config.php';$sql = "SELECT * FROM MdDob ORDER BY SIFRA";
         $result = $link->query($sql);
          if(mysqli_num_rows($result) > 0) { ?>
        <table class="table">
          <thead class="thead-dark" style="color:white;">
            <tr>
              <th>SIFRA</th>
              <th>NAZIV</th>
              
              <th>ULICA</th>
             
              <th>PTT</th>
              <th>MESTO</th>
              
              <th>TEL</th>
              <th>KONTAKT</th>
             
              <th>RABAT</th>
              <th>MEMO</th>
            </tr>
          </thead>
          <tbody id="myTable">
        <!-- prikazi podatak za svaki red -->
         <?php while($row = mysqli_fetch_assoc($result)) {echo "<tr><td>" . $row["SIFRA"]. "</td><td>" . $row["NAZIV"]. "</td><td>". $row["ULICA"]. "</td><td>".$row["PTT"]. "</td><td>".$row["MESTO"]. "</td><td>".$row["TEL"]. "</td><td>".$row["KD"]. "</td><td>".$row["RABAT"]. "</td><td>".$row["MEMO"]. "</td></tr>";
         } echo "</tbody></table>"; }
        else {echo "0 results";}
?>
  </div>
 </body>
 
</html>

