<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php $thisPage="Firma"; ?>
 <body>
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
        <h5 class="modal-title" id="exampleModalLabel">Racun: Podaci o firmi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div id="fi02"></div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form01">
              
                   <br> <div id="fr01" style="margin-bottom:10px;">
                                
                        
                                <section class="section01" >
                                    <div>Region:</div>
                                        <div>
                                                <select name="region">
                                                    <option value="srbija">Srbija</option>
                                                    <option value="hr">Hrvatska</option>
                                                    <option value="cg">Crna Gora</option>
                                                    <option value="rs">Republika Srpska</option>
                                                    <option value="fbih">Federacija BiH</option>
                                                </select>
                                        </div>
                                    
                                </section>
                   </div>
               

                    <section style="margin-bottom:10px;"> 
                        <b>Naziv:</b>
                        <div><input type="text" name="naziv" class="width415"></div>
                    </section>
                    <section style="margin-bottom:10px;"> 
                        <div>Vlasnik:</div>
                        <div><input type="text" name="vlasnik" class="width415"></div>
                    </section>
                    <div id="fr01" style="margin-bottom:10px;">
                            <section class="section01"> 
                                <div>Mjesto firme:</div>
                                <div><input type="text" name="mjesto"></div>
                            </section>
                            <section class="section01"> 
                                <div>Mjesto izdavanja racuna:</div>
                                <div><input type="text" name="mjestoizd"></div>
                            </section>
                    </div>
                    <section style="margin-bottom:10px;"> 
                        <div>Ulica:</div>
                        <div><input type="text" name="ulica" class="width415"></div>
                    </section>
                    <section style="margin-bottom:3px;"> 
                        
                            <div class="dropdown">
                                <div id="firma-aktiviraj" class="leftnav" ><div class="left_nav_text" >Klikni za unos tekuceg</div></div>
                                    <div class="dropdown-content">
                                        <a href="#"><input type="text" name="tr01"></a>
                                        <a href="#"><input type="text" name="tr02"></a>
                                        <a href="#"><input type="text" name="tr03"></a>
                                        <a href="#"><input type="text" name="tr04"></a>
                                        <a href="#"><input type="text" name="tr05"></a>
                                        
                                    </div>
                             </div>

                        </section>
                    <div id="fr01" style="margin-bottom:10px;">
                                <section class="section01"> 
                                    <div>JIB:</div>
                                    <div><input type="text" name="jib"></div>
                                </section>
                                <section class="section01"> 
                                    <div>PIB:</div>
                                    <div><input type="text" name="pib"></div>
                                </section>
                    </div>
                                <section  style="margin-bottom:10px;"> 
                                    <div><input type="checkbox" name="obveznikpdv">Obveznik PDV</div>
                                    
                                </section>
                    
                    <section style="margin-bottom:10px;"> 
                        <div>Kontakt:</div>
                        <div><input type="text" name="kontakt" class="width415"></div>
                    </section>
                
      

        </div>
      <div class="modal-footer">
        <input type="Submit"  class="btn btn-primary" value="Sacuvaj" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container d-flex justify-content-around">
 <div class="col-lg-11 tcontainer " style="height:100%; padding-left: 5px;">

<?php 
    if (array_key_exists('region', $_POST)  OR array_key_exists('naziv', $_POST)) {
        
        include '../../config.php';
        
        
       if ($_POST['naziv'] == '') {
            
                echo "<p>Naziv je obavezan.</p>";
                
            } else if ($_POST['region'] == '') {
                
                echo "<p>Region je obavezan.</p>";
                
            }  
            else {
            $naziv = mysqli_real_escape_string($link, $_POST['naziv']);
            $query = "SELECT `sifra` FROM `firma` WHERE naziv = '$naziv'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<p>To ime već postoji.</p>";
                
            }
                
            
            
            else {
                $racun = mysqli_real_escape_string($link, $_POST['region']);
                $naziv = mysqli_real_escape_string($link, $_POST['naziv']);
                $vlasnik= mysqli_real_escape_string($link, $_POST['vlasnik']);
                $mjesto = mysqli_real_escape_string($link, $_POST['mjesto']);
                $mjestoizd  = mysqli_real_escape_string($link, $_POST['mjestoizd']);
                $ulica = mysqli_real_escape_string($link, $_POST['ulica']);
                $tr01 = mysqli_real_escape_string($link, $_POST['tr01']);
                $tr02 = mysqli_real_escape_string($link, $_POST['tr02']);
                $tr03 = mysqli_real_escape_string($link, $_POST['tr03']);
                $tr04 = mysqli_real_escape_string($link, $_POST['tr04']);
                $tr05 = mysqli_real_escape_string($link, $_POST['tr05']);
                $pib = mysqli_real_escape_string($link, $_POST['jib']);
                $pepdv = mysqli_real_escape_string($link, $_POST['pib']);
                $obveznikpdv = mysqli_real_escape_string($link, $_POST['obveznikpdv']);
                $kontakt = mysqli_real_escape_string($link, $_POST['kontakt']);
                
            
              $query = "INSERT INTO `firma`(`naziv`, `vlasnik`, `mjesto`, `mjestoizd`, `ulica`, `racun`, `pib`, `pepdv`, `obvznkpdv`, `kontakt`, `racun1`, `racun2`, `racun3`, `racun4`, `racun5`) 
              VALUES ('$naziv', '$vlasnik', '$mjesto', '$mjestoizd', '$ulica', '$racun', '$pib', '$pepdv', ' $obveznikpdv', '$kontakt', ' $tr01', ' $tr02', ' $tr03', ' $tr04', ' $tr05')";
                    
                     if (mysqli_query($link, $query)) {
                       
                      $sql = "SELECT sifra, naziv, mjesto, ulica, kontakt FROM firma ORDER BY sifra";
                        $result = $link->query($sql);
                        
                        if ($result->num_rows > 0) {?>
                           
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
                            <?php while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["sifra"]. "</td><td>" . $row["naziv"]. "</td><td>" . $row["mjesto"]. "</td><td>". $row["ulica"]. "</td><td>". $row["kontakt"]. "</td></tr>";
                            }
                            echo "</tbody></table>";
                    
} else {
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
