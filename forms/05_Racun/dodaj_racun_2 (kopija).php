
 <?php 
 
 $thisPage="Racuni";
 include("../../header_forms.php");?>

 <?php 
 
 require_once("../../configrc.php");
 $db_handle = new DBController();
 if(!empty($_GET["action"])) {
 switch($_GET["action"]) {
   case "add":
      if(!empty($_POST["quantity"])) {
        
        $productByCode = $db_handle->runQuery("SELECT * FROM MdArt WHERE SIFRA ='" . $_GET["SIFRA"] . "'");
        
        //Declare items as array
        $itemArray = array($productByCode[0]["SIFRA"]=>array('SIFRA'=>$productByCode[0]["SIFRA"], 'NAZIV'=>$productByCode[0]["NAZIV"], 'quantity'=>$_POST["quantity"], 'JMERE"'=>$productByCode[0]["JMERE"], 'PRODCEN'=>$productByCode[0]["PRODCEN"]));

        if(!empty($_SESSION["cart_item"])) {
          if(in_array($productByCode[0]["SIFRA"],array_keys($_SESSION["cart_item"]))) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                if($productByCode[0]["SIFRA"] == $k) {
                  if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                  }
                  $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                }
            }
          } else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
          }
        } else {
          $_SESSION["cart_item"] = $itemArray;
        }
      }
    break;
    case "remove":
      if(!empty($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $k => $v) {
            if($_GET["SIFRA"] == $k)
              unset($_SESSION["cart_item"][$k]);				
            if(empty($_SESSION["cart_item"]))
              unset($_SESSION["cart_item"]);
        }
      }
    break;
    case "empty":
      unset($_SESSION["cart_item"]);
    break;	
  }
  }

  
 
 
 ?>

 <div class="container-fluid">
   <div class="row">
   	<!----------------------------------------------------------------------Lista artikala--------------------------------------------------------------->
     <div class="col-sm-7" style="height:500px; overflaw:scroll;">
   
     <div id="product-grid">
	  <div class="txt-heading">PROIZVODI I USLUGE</div>
    <table class="table table-fixed">
            <thead class="thead-dark" style="color:white;" >

              <tr>
              <th>SIFRA</th>
              <th>NAZIV</th>
			        <th>J.&nbsp;MJERE</th>
              <th>CIJENA</th>
              <th>KOLIČINA</th>
              <th>UNESI</th>
              </tr>
            </thead>
            <tbody id="myTable" > 
  <?php
 
      
        $product_array = $db_handle->runQuery ("SELECT * FROM MdArt ORDER BY SIFRA ASC");

         if (!empty($product_array)) { 
          foreach($product_array as $key=>$value){
        ?>
           
        <!-- prikazi podatak za svaki red -->
         
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=add&SIFRA=<?php echo $product_array[$key]["SIFRA"]; ?>"> 
         <tr>
         <td><?php echo $product_array[$key]["SIFRA"]; ?></td>
         <td><?php echo $product_array[$key]["NAZIV"]; ?></td>
         <td><?php echo $product_array[$key]["JMERE"]; ?></td>
         <td><?php echo $product_array[$key]["PRODCEN"]; ?></td>
         <td><input type="text" class="product-quantity" name="quantity" value="1" size="2" /></td>
         <td><input type="submit" value="U korpu" class="btnAddAction" /></td>
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
     <div id="shopping-cart">
     <div class="txt-heading">IZABERI FIRMU</div>
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
      
      <!-------------------------------------------------------------------------Artikli-------------------------------->
        <div class="txt-heading" style="margin-bottom:15px;">FAKTURA</div>
        <?php
        if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
        ?>	
    
         <table class="table">
         <tbody>
         
            <tr>
            <th>ŠIFRA</th>
            <th>NAZIV</th>
            <th  width="5%">KOL.</th>
            <th width="10%">CIJENA</th>
            <th  width="10%">UKUPNO</th>
            <th width="5%">UKLONI</th>
            </tr>	
         
        <?php		
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["PRODCEN"];
            ?>
              <tr>
              <td><?php echo $item["SIFRA"]; ?></td>
              <td><?php echo $item["NAZIV"]; ?></td>
              <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
              <td  style="text-align:right;"><?php echo $item["PRODCEN"]."KM"; ?></td>"
              <td  style="text-align:right;"><?php echo number_format($item_price,2)."KM"; ?></td>
              <td style="text-align:right;"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=remove&SIFRA=<?php echo $item["SIFRA"]; ?>" class="btnRemoveAction"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["PRODCEN"]*$item["quantity"]);
		}
		?>

            <tr>
            <td colspan="2" style="text-align:right; font-weight: bold; color: black;">UKUPNO ZA UPLATU:</td>
            <td style="text-align:right; font-weight: bold; color: black;"><?php echo $total_quantity; ?></td>
            <td style="text-align:right; font-weight: bold; color: black;" colspan="2"><strong><?php echo number_format($total_price, 2)."KM "; ?></strong></td>
            <td></td>
            </tr>
            <tr>
              <td><a id="btnEmpty" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=empty">Izbriši</a></td>
              <td><a id="btnEmpty" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=save">Fakturiši/Sačuvaj</a></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
            
              </tbody>
            </table>		
              <?php
            } else {
            ?>
            <div class="no-records">Unesite artikle</div>
            <?php 
            }
            ?>
            </div>
            </div>
            </div>
     </div>
   </div>
 </div>
 
 </body>
 
</html>

