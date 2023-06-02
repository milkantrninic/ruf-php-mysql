<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
 <?php 
 require_once("../../configrc.php");
 $db_handle = new DBController();

  
 if(!empty($_POST["otvori_fakturu"])) {
  $racun = $_POST["otvori_fakturu"];

 } 
 else {
  $racun = "";
 }
if(!empty($_GET["BRFAK"])){
  $racun = $_GET["BRFAK"];
}
 


 if(!empty($_GET["action"])) {
 switch($_GET["action"]) {
   case "add":
      if(!empty($_POST["KOLICINA"])) {
        
        $productByCode = $db_handle->runQuery("SELECT * FROM MdArt WHERE SIFRA ='" . $_GET["SIFRA"] . "'");
        $itemArray = array($productByCode[0]["SIFRA"]=>array('SIFRA'=>$productByCode[0]["SIFRA"], 'NAZIV'=>$productByCode[0]["NAZIV"], 'KOLICINA'=>$_POST["KOLICINA"], 'JMERE"'=>$productByCode[0]["JMERE"], 'PRODCEN'=>$productByCode[0]["PRODCEN"]));
        $item3 = $db_handle->runQuery("SELECT * FROM `RN$racun` WHERE SIFRA ='" . $_GET["SIFRA"] . "'");

        if(!empty($_POST["otvori_fakturu"])){
          if(!empty($item3)) {
              foreach($item3 as $k => $v) {
               
              $item_kol = $item3[$k]["KOLICINA"] + $_POST["KOLICINA"];
              $upd_art = $_GET["SIFRA"];
              $upd_art1 =" UPDATE `RN$racun` SET KOLICINA = '".$item_kol."' WHERE SIFRA = '".$upd_art."'";
              $azurirano = $db_handle->updateQuery($upd_art1);
              $_POST["KOLICINA"]=0;
              $item3[$k]["KOLICINA"]=0;
                                                                   
                                          }

             
            } else {
              $item2 = $itemArray;
              foreach($item2 as $key=>$value) {
              $insertNew = "INSERT INTO `RN$racun` (`RN_ID`, `SIFRA`, `BRFAK`, `BARCODE`, `NAZART`, `JMERE`, `KOLICINA`, `PRODCEN`, `RABAT`, `TARGR`, `PSPOR`, `OPISART`) VALUES (NULL, '".$item2[$key]["SIFRA"]."', '$racun', NULL, '".$item2[$key]["NAZIV"]."', NULL, '".$item2[$key]["KOLICINA"]."', '".$item2[$key]["PRODCEN"]."', NULL, NULL, NULL, NULL)";  
              $db_handle->insertQuery($insertNew);}

            }
            }
        } 
      
    break;
    case "remove":

    if(!empty($_GET["SIFRA"])){
          $del_art = $_GET["SIFRA"];
          $del_id = "DELETE FROM `RN$racun` WHERE SIFRA = '".$del_art."'";
          $obrisana = $db_handle->deleteQuery($del_id);
    }
    break;
    case "empty":
    if(!empty($_GET["BRFAK"])){
          $del_id2 = "DELETE FROM `RN$racun`";
          $obrisana = $db_handle->deleteQuery($del_id2);
    }

      
      
    break;
    case "klauzula":
               
              if(!empty($_GET["BRFAK"])){
                
                function are_int($n) {
                  if ( (int) $n !== $n ) {
                  return 0;
              } else {
                  return $n ;
              }
              }
                $klauzule = $db_handle->estringQuery($_POST['klauzule']);
                $napomena = $db_handle->estringQuery($_POST['napomena']);
                $br_otpremnice = $db_handle->estringQuery($_POST['br_otpremnice']);
                $br_fiskalnog =  $_POST['br_fiskalnog'];
                $br_fiskalnog =  are_int($br_fiskalnog);
                $poreskoOslobodjenje = $db_handle->estringQuery($_POST['poresko_oslobodjenje']);
                $predao = $db_handle->estringQuery($_POST['predao']);
                $primio = $db_handle->estringQuery($_POST['primio']);
                $br_lk = $db_handle->estringQuery($_POST['br_lk']); 
                
                if (!empty($klauzule || $napomena || $br_otpremnice || $br_fiskalnog || $poresko_oslobodjenje || $predao || $primio || $br_lk)){
                  $insertKlauzule = "UPDATE UFakt SET KLAUZULA = '".$klauzule."', NAPOMENA1 = '".$napomena."', BROTP = '".$br_otpremnice."', BRFI = '".$br_fiskalnog."', OPISPOROSL = '".$poreskoOslobodjenje."', PREDAO = '".$predao."', PRIMIO = '".$primio."', PRIMIO_LK = '".$br_lk."'   WHERE BRFAK = '".$racun."'";
                $insertKlauzuleDone = $db_handle->updateQuery($insertKlauzule);}
                  
            }
         break;
    
  }
  }

 
 ?>
 
<?php 
$thisPage="Racuni";
include("../../header_forms.php");
?>
 <!-------------------------------------------------------------------------Proizvodi i usluge------------>
      
 <div class="container-fluid">
   <div class="row d-flex justify-content-around">
   
    <div class="col-lg-6 tcontainer" style="height:1050px; overflow-y: scroll; padding-left: 5px; ">
   
     <div id="product-grid">
	  <div class="txt-heading">PROIZVODI I USLUGE</div>
    <table class="table table-striped">
      <thead class="thead-dark">

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
         <td><input type="text" class="product-KOLICINA" name="KOLICINA" value="1" size="2" onclick="select()"/></td>
         <td><input type="hidden" name="otvori_fakturu" value="<?php echo $racun;?>"><input type="submit" value="U korpu" class="btnAddAction" /></td>
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
      <!-----------------------------------------------------------Faktura----------------------------------------------->
      <div class="col-lg-5 tcontainer" style="max-width: 45%;">
     <div class="col-lg-12">
   
     <div id="product-grid">
     <div class="txt-heading" style="margin-bottom:15px;">BROJ FAKTURE: &nbsp;<span style="color:red;"><?php echo $racun;?></span>&nbsp;&nbsp;<a class="btnEmpty <?php if (empty($racun)){ echo "animate";}?>"href="dodaj_racun.php">Izaberi drugu fakturu</a></div> 
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>BR.</th>
          <th>NAZIV&nbsp;KUPCA</th>
          <th>MJESTO&nbsp;KUPCA</th>
          <th>ULICA&nbsp;KUPCA</th>
          <th>NAPOMENA</th>
          
        </tr>
      </thead>
      <tbody>
      <?php 
      if(!empty($racun)){
        $product_array = $db_handle->runQuery("SELECT * FROM UFakt WHERE BRFAK = '" . $racun . "' ORDER BY BRFAK DESC");
        if (!empty($product_array)) {
          foreach($product_array as $key=>$value) { ?>
           <form method="post" action="dodaj_racun_2.php" >
         
                <tr>
                  <td><?php echo $product_array[$key]["BRFAK"]; ?></td>
                  <td><?php echo $product_array[$key]["NAZKUP"]; ?></td>
                  <td><?php echo $product_array[$key]["MESKUP"]; ?></td>
                  <td><?php echo $product_array[$key]["ULKUP"]; ?></td>
                  <td><?php echo $product_array[$key]["NAPOMENA1"]; ?></td>
                
                </tr>
            
           
           
           </form>


            <?php
          }
        } }

      ?>
      
      </tbody>
    </table>



    </div>
    
    </div>
     <!-----------------------------------------------Artikli-------------------------------->
    
    <div class="col-lg-12">
        
        <div style="height: 100%;">
     
      <div style="display:flex; flex-direction: column; "><div style="float:left;">
      <div class="txt-heading" style="margin-bottom:15px;">STAVKE</div> 
      <?php
      if(!empty($racun)){
      $item = $db_handle->runQuery("SELECT * FROM `RN$racun` ORDER BY SIFRA ASC");
        if(!empty($item)){
            $total_KOLICINA = 0;
            $total_price = 0;
        ?>		
    
    <table class="table table-striped">
      <thead class="table-secondary">
          <tr>
            <th width="5%">ŠIFRA</th>
            <th>NAZIV</th>
            <th  width="5%">KOL.</th>
            <th width="10%">CIJENA</th>
            <th  width="10%">UKUPNO</th>
            <th width="5%">UKLONI</th>
            </tr>	
            </thead>
            
            <?php		
              
              foreach ($item as $key=>$value){
                  $item_price = $item[$key]["KOLICINA"]*$item[$key]["PRODCEN"];
              ?>
              <tr>
              <td><?php echo $item[$key]["SIFRA"]; ?></td>
              <td><?php echo $item[$key]["NAZART"]; ?></td>
              <td style="text-align:right;"><?php echo $item[$key]["KOLICINA"]; ?></td>
              <td  style="text-align:right;"><?php echo $item[$key]["PRODCEN"]."&nbsp;KM"; ?></td>
              <td  style="text-align:right;"><?php echo number_format($item_price,2)."&nbsp;KM"; ?></td>
              <td style="text-align:right;"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=remove&SIFRA=<?php echo $item[$key]["SIFRA"]; ?>&BRFAK=<?php echo $racun;?>" class="btnRemoveAction"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
              <?php
				$total_KOLICINA += $item[$key]["KOLICINA"];
				$total_price += ($item[$key]["PRODCEN"]*$item[$key]["KOLICINA"]);
	         
                                if (!empty($total_price)){
                                $upd_kupce =" UPDATE `UFakt` SET ZAPLA = '".$total_price."' WHERE BRFAK = '".$racun."'";
                                $db_handle->updateQuery("$upd_kupce");}
                                else {
                                     $upd_kupce =" UPDATE `UFakt` SET ZAPLA = '0' WHERE BRFAK = '".$racun."'";
                                $db_handle->updateQuery("$upd_kupce");}
      }
		?>

            <tr>
            <td colspan="2" style="text-align:right; font-weight: bold; color: black;">UKUPNO ZA UPLATU:</td>
            <td style="text-align:right; font-weight: bold; color: black;"><?php echo $total_KOLICINA; ?></td>
            <td style="text-align:right; font-weight: bold; color: black;" colspan="2"><strong><?php echo number_format($total_price, 2)."KM "; ?></strong></td>
            <td></td>
            </tr>
            <tr>
              <td><a id="btnEmpty" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=empty&BRFAK=<?php echo $racun;?>">Izbriši</a></td>
              <td><a id="btnEmpty" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=save">Fakturiši/Sačuvaj</a></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
            </table>
      <?php 
      
            } else {
              if(!empty($_POST["otvori_fakturu"])){
            ?>
            <div class="no-records" >Unesite artikle</div>
            <?php 
            } else {
              ?>
            <div class="no-records" >Unesite artikle</div>
            <?php 
            }

          }}
          
          else {?>
            
            <div class="no-records" >Prvo morate izabrati fakturu</div>
          <?php
          }
            ?>
            </div>
            </div>
            
            </div>
            </div>
     
     <!-----------------------------------------------Klauzule-------------------------------------------->
            <?php 
            
            if (!empty($racun)) {
                $selectKlauzule = $db_handle->runQuery("SELECT * FROM UFakt WHERE BRFAK = '" . $racun . "' ORDER BY BRFAK DESC");
               if (!empty($selectKlauzule)) {
          foreach($product_array as $key=>$value) { ?>
            
            
            <div class="col-lg-12">
              <div class="product-grid">
              <div class="txt-heading" style="margin:0 0 15px 5px;">KLAUZULE</div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=klauzula&BRFAK=<?php echo $racun;?>" method="post" >
              <div class="col-lg-12 d-flex flex-row">
              <div class="col-lg-6">
                <div class="form-group">
                <label for="exampleInputPassword1">Klauzule</label>
                <textarea name="klauzule" class="form-control my-2" placeholder="Unesite klauzulu" rows="3" ><?php echo $selectKlauzule[$key]["KLAUZULA"]; ?></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Napomena</label>
                <textarea type="text" name="napomena" class="form-control my-2" placeholder="Unesite napomenu" rows="3"><?php echo $selectKlauzule[$key]["NAPOMENA1"]; ?></textarea> 
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Broj otpremnice</label>
                <input type="text" name="br_otpremnice" class="form-control my-2" placeholder="Unesite broj otpremnice" value="<?php echo $selectKlauzule[$key]["BROTP"]; ?>">
                </div>
              <button type="submit" id="btnEmpty" style="float: left;">Sačuvaj</button>
              </div>
              
              <div class="col-lg-6">
                <div class="form-group">
                <label for="exampleInputPassword1">Broj fiskalnog</label>
                <input type="text" name="br_fiskalnog" class="form-control my-2" placeholder="Unesite broj fiskalnog" value="<?php echo $selectKlauzule[$key]["BRFI"]; ?>">  
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Poresko oslobodjenje</label>
                <input type="text" name="poresko_oslobodjenje" class="form-control my-2" placeholder="Unesite poresko oslobodjenje" value="<?php echo $selectKlauzule[$key]["OPISPOROSL"]; ?>"> 
                </div>
              
                <div class="form-group">
                <label for="exampleInputPassword1">Predao</label>
                <input type="text" name="predao" class="form-control my-2" placeholder="Ko je predao" value="<?php echo $selectKlauzule[$key]["PREDAO"]; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Primio</label>
                <input type="text" name="primio" class="form-control my-2" placeholder="Ko je primio" value="<?php echo $selectKlauzule[$key]["PRIMIO"]; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Broj lične karte</label>
                <input type="text" name="br_lk" class="form-control my-2" placeholder="Broj lične" value="<?php echo $selectKlauzule[$key]["PRIMIO_LK"]; ?>">
                </div> 
              </div>
              </div>
              
              </form>
             
            </div>
            </div>
     
      <?php
            }
             } 
            }
                ?> 
     <!----------------------------------Kraj Klauzule----------------------------------------->
            </div>
            
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

