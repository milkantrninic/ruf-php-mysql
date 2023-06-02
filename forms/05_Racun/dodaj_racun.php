<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
 <?php 
 
 $thisPage="Racuni";
 include("../../header_forms.php");
 require_once("../../configrc.php");
 $db_handle = new DBController();
 $last_id="";
        if(isset($_POST["kupci"])){
          $new = $_POST["kupci"]; 
          $insert_sql="INSERT INTO UFakt (`NAZKUP`) VALUE ('$new')";
          if($db_handle->insertQuery($insert_sql) === TRUE){
            $last_id = "SELECT BRFAK FROM UFakt ORDER BY BRFAK DESC LIMIT 0, 1";
            $last_id = $db_handle->runQuery($last_id);
            $last_id = $last_id[0]["BRFAK"];
            $last_id = sprintf('%06d', $last_id);
            $create_sql = "CREATE TABLE `RN$last_id` (
              `RN_ID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
              `SIFRA` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
              `BRFAK` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
              `BARCODE` char(13) DEFAULT NULL,
              `NAZART` char(40) DEFAULT NULL,
              `JMERE` char(3) DEFAULT NULL,
              `KOLICINA` decimal(12,3) DEFAULT NULL,
              `PRODCEN` decimal(12,3) DEFAULT NULL,
              `RABAT` decimal(15,9) DEFAULT NULL,
              `TARGR` char(3) DEFAULT NULL,
              `PSPOR` decimal(6,3) DEFAULT NULL,
              `OPISART` blob,
              PRIMARY KEY (RN_ID)
              
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $db_handle->insertQuery($create_sql);
            
          }
        }
        if(!empty($last_id)){
          $poruka = "(Nova faktura broj: $last_id)";

        }
        else {
          $poruka ="";
        }
       
        
         ?>




 <div class="container-fluid">
   <div class="row d-flex justify-content-around">
   	<!----------------------------------------------------------------------Lista artikala--------------------------------------------------------------->
     <div class="col-lg-8 tcontainer" style="height:600px; overflow-y: scroll; padding-left: 5px;">
   
     <div id="product-grid">
	  <div class="txt-heading">LISTA FAKTURA&nbsp;<span style="color:red;"><?php echo $poruka;?></div>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>BR.</th>
          <th>NAZIV&nbsp;KUPCA</th>
          <th>MJESTO&nbsp;KUPCA</th>
          <th>ZA&nbsp;PLATITI</th>
          <th>NAPOMENA&nbsp;1</th>
          <th>POGLEDAJ</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php 
        $product_array = $db_handle->runQuery("SELECT * FROM UFakt ORDER BY BRFAK DESC");
        if (!empty($product_array)) {
          foreach($product_array as $key=>$value) { ?>
           <form method="post" action="dodaj_racun_2.php" >
           <?php 
           
              if ($product_array[$key]["BRFAK"] == $last_id){
                $lastrow = "table-primary";
              }
              else {
                $lastrow = "";
           } 

           ?>
                <tr class="<?php echo $lastrow;?>">
                  <td><?php echo $product_array[$key]["BRFAK"]; ?></td>
                  <td><?php echo $product_array[$key]["NAZKUP"]; ?></td>
                  <td><?php echo $product_array[$key]["MESKUP"]; ?></td>
                  <td><?php echo number_format($product_array[$key]["ZAPLA"], 2);?></td>
                  <td><?php echo $product_array[$key]["NAPOMENA1"]; ?></td>
                  <td><input type="hidden" name="otvori_fakturu" value="<?php echo $product_array[$key]["BRFAK"]; ?>"><input type="submit" value="OTVORI" class="btnAddAction" /></td>
                </tr>
            
           
           
           </form>


            <?php
          }
        }

      ?>
      
      </tbody>
    </table>



    </div>
    
    </div>
    
      	<!----------------------------------------------------Korpa--------------------------------->
     <div class="col-lg-3 tcontainer" style="height: 100%; padding-bottom: 10px;">
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
     <div id="shopping-cart">
     
	  <div class="txt-heading">IZABERI KUPCA</div>
    <br>
           <select name="kupci">
  <?php
 
      
        $kupac_array = $db_handle->runQuery ("SELECT * FROM MdDob ORDER BY SIFRA ASC");

         if (!empty($kupac_array)) { 
          foreach($kupac_array as $key=>$value){
        ?> 
        <!-- prikazi podatak za svaki red -->
        
          <option placeholder="Izaberi kupca"><?php echo $kupac_array[$key]["NAZIV"]; ?></option>
        
        <?php
            }
          }
          ?>
          </select>
         <br><br>
         <div class="txt-heading">Napravite novu fakturu</div>
         <input type="submit" value="Nova faktura" class="btnEmpty" />
         </div>
         </form>
         
         
         </div>
         </div>
         </div>

        
         
         <script>
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
          </script>
 </body>
 
</html>

