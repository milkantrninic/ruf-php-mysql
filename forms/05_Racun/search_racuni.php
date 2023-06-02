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
         ?>




 <div class="container-fluid">
   <div class="row d-flex justify-content-around" >
   	<!----------------------------------------------------------------------Lista artikala--------------------------------------------------------------->
     <div class="col-lg-11 tcontainer" style="height:100%; padding-left: 5px;">
   
     <div id="product-grid">
	  <div class="txt-heading">LISTA FAKTURA&nbsp;<span style="color:red;"><?php //echo $poruka;?></div>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>BR.</th>
          <th>NAZIV&nbsp;KUPCA</th>
          <th>MJESTO&nbsp;KUPCA</th>
          <th>ZA&nbsp;PLATITI</th>
          <th>NAPOMENA</th>
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
             /*if ($product_array[$key]["BRFAK"] == $last_id){
                $lastrow = "table-primary";
              }
              else {
                $lastrow = "";
           }*/

           ?>
                <tr class="<?php //echo $lastrow;?>">
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
    
    
      	<!----------------------------------------------------------------------Korpa--------------------------------------------------------------->
   
         </div>
         </div>

        
         
         <script>
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
          </script>
 </body>
 
</html>

