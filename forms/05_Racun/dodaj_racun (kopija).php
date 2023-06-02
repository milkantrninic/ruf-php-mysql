
 <?php 
 
 $thisPage="Racuni";
 include("../../header_forms.php");
 ?>

 <?php 
 
 require_once("../../configrc.php");
 $db_handle = new DBController();
 
 
 ?>

<?php
          if(!empty($_POST["kupci"])) {
            $kupac_array2 = $db_handle->runQuery("SELECT * FROM MdDob WHERE NAZIV ='" . $_POST["kupci"] . "'");

          }
         ?>

 <div class="container-fluid">
   <div class="row">
   	<!----------------------------------------------------------------------Lista artikala--------------------------------------------------------------->
     <div class="col-sm-7" style="height:500px; overflaw:scroll;">
   
     <div id="product-grid">
	  <div class="txt-heading">LISTA FAKTURA</div>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>BROJ&nbsp;FAKTURE</th>
          <th>NAZIV&nbsp;KUPCA</th>
          <th>MJESTO&nbsp;KUPCA</th>
          <th>ZA&nbsp;PLATITI</th>
          <th>NAPOMENA&nbsp;1</th>
          <th>POGLEDAJ</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php 
        $product_array = $db_handle->runQuery("SELECT * FROM UFakt ORDER BY BRFAK ASC");
        if (!empty($product_array)) {
          foreach($product_array as $key=>$value) { ?>
           <form method="post" action="dodaj_racun_2.php?action=open&BRFAK=<?php echo $product_array[$key]["BRFAK"]; ?>" >
                <tr>
                  <td><?php echo $product_array[$key]["BRFAK"]; ?></td>
                  <td><?php echo $product_array[$key]["NAZKUP"]; ?></td>
                  <td><?php echo $product_array[$key]["MESKUP"]; ?></td>
                  <td><?php echo number_format($product_array[$key]["ZAPLA"], 2);?></td>
                  <td><?php echo $product_array[$key]["NAPOMENA1"]; ?></td>
                  <td><input type="submit" value="OTVORI" class="btnAddAction" /></td>
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
    
    
      	<!----------------------------------------------------------------------Korpa--------------------------------------------------------------->
     <div class="col-sm-5">
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
     <div id="shopping-cart">
     <div class="">IZABERI FIRMU</div>
    <br>
           <select name="firma">
  <?php
 
      
        $firma_array = $db_handle->runQuery ("SELECT * FROM firma ORDER BY sifra ASC");

         if (!empty($firma_array )) { 
          foreach($firma_array  as $key=>$value){
        ?> 
        <!-- prikazi podatak za svaki red -->
        
          <option placeholder="Izaberi kupca"><?php echo $firma_array[$key]["naziv"]; ?></option>
        
        <?php
            }
          }
          ?>
          </select>
         <br><br>
	  <div class="">IZABERI KUPCA</div>
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
         <div><?php print_r($kupac_array2);?></div> <br><br>
         <div><?php echo $kupac_array2[0]["NAZIV"];?></div>
         
         </div>
         </div>
         </div>

        
         
 
 </body>
 
</html>

