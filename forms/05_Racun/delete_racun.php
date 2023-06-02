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
 $poruka = "";
 if(!empty($_POST["id"])){
    $id = $_POST["id"];
    
    $del_id = "DELETE FROM UFakt WHERE BRFAK = '".$id."'";
    $obrisana = $db_handle->deleteQuery($del_id);
    $table_no = sprintf('%06d', $id);
    $drop_table = "DROP TABLE `RN$table_no`";
    $db_handle->deleteQuery($drop_table);
    
    if (isset($obrisana)) {
        $poruka = "(obrisana faktura broj: $id)";

    } else {
        $poruka = "";

    }
    

 }

?>
<div class="col-sm-7">
   
   <div id="product-grid">
    <div class="txt-heading">LISTA FAKTURA&nbsp;<span style="color:red;"><?php echo $poruka;?></span></div>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>BR.</th>
        <th>NAZIV&nbsp;KUPCA</th>
        <th>MJESTO&nbsp;KUPCA</th>
        <th>ZA&nbsp;PLATITI</th>
        <th>NAPOMENA&nbsp;1</th>
        <th>OBRIŠI</th>
      </tr>
    </thead>
    <tbody id="myTable">
<?php 
$product_array = $db_handle->runQuery("SELECT * FROM UFakt ORDER BY BRFAK DESC ");
if (!empty($product_array)) {
    foreach($product_array as $key=>$value){?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                 <tr>
                  <td><?php echo $product_array[$key]["BRFAK"]; ?></td>
                  <td><?php echo $product_array[$key]["NAZKUP"]; ?></td>
                  <td><?php echo $product_array[$key]["MESKUP"]; ?></td>
                  <td><?php echo number_format($product_array[$key]["ZAPLA"], 2);?></td>
                  <td><?php echo $product_array[$key]["NAPOMENA1"]; ?></td>
                  <td>
                  <input type="hidden" name="id" value="<?php echo $product_array[$key]["BRFAK"]; ?>">
                  <input type="submit" value="OBRIŠI" class="btnAddAction" /></td>
                </tr>


    </form>
    <?php
    }
}
?>

    </div></div>

    <script>
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
          </script>
</body>
</html>
