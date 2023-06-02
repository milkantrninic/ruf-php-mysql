<?php include '../../config.php';

$query = "SELECT * FROM MdArt WHERE USLUGA <> 1 ORDER BY SIFRA";
$result = mysqli_query($link, $query);
?>
<?php $thisPage="Roba"; ?>

 <?php include("../../header_forms.php");?>
<div class="container col-lg-12 d-flex justify-content-around">
 <div class="col-lg-11 tcontainer " style="height:100%; padding-left: 5px; padding-right: 25px;">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold;">Selektujte redove koje hoćete da obrišete</h3><br />
   <?php
   if(mysqli_num_rows($result) > 0)
   {
   ?>
    <div class="tabel table-striped" style="height:550px; overflow-y: scroll; padding-right: 10px;">
   <br />
   <h3 style="text-transform: uppercase;">
   <table class="table">
            <thead class="thead-dark" style="color:white;">
              <tr>
              <th>SIFRA</th>
              <th>BARKOD</th>
              <th>NAZIV</th>
              <th>J.&nbsp;MJERE</th>
              <th>ULAZ</th>
              <th>IZLAZ</th>
              <th>OBRIŠI</th>
              </tr>
            </thead>
			<tbody id="myTable"> 
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
     <tr id="<?php echo $row["SIFRA"]; ?>" >
                <td data-target="SIFRA"><?php echo $row['SIFRA']; ?></td>
                <td data-target="BARCODE"><?php echo $row['BARCODE']; ?></td>
                <td data-target="NAZIV"><?php echo $row['NAZIV']; ?></td>
                <td data-target="JMERE"><?php echo $row['JMERE']; ?></td>
                <td data-target="ULAZ"><?php echo $row['ULAZ']; ?></td>
                <td data-target="IZLAZ"><?php echo $row['IZLAZ']; ?></td>
      <td><input type="checkbox" name="sifra" class="delete_customer" value="<?php echo $row["SIFRA"]; ?>" /></td>
     </tr>
   <?php
    }
   ?>
    </tbody></table>
   </div>
   <?php
   }
   ?>
   <div style="text-align:center;">
    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-info" >Obriši</button>
   </div>
    </div>
      </div>
 </body>
</html>

<!-- Ajax Java Script-->
<script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Da li ste sigurni da hoćete ovo da obrište?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Molim Vas da selektujete makar jednu firmu");
   }
   else
   {
    $.ajax({
     url:'delete.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>