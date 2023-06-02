<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>
<?php
include '../../config.php';
?>

<?php $thisPage="Usluge"; ?>

 <?php include("../../header_forms.php");?>
 <div class="container">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold;">Selektujte redove koje hoćete da obrišete</h3><br />
   <?php
   $query = "SELECT * FROM `MdArt` WHERE USLUGA = 1 ORDER BY SIFRA";
   $result = mysqli_query($link, $query);
   if(mysqli_num_rows($result) > 0)
   {
   ?>
   <div class="table-responsive">
   <table class="table">
            <thead class="thead-dark" style="color:white;">
              <tr>
              <th>Šifra</th>
              <th>Naziv</th>
              <th>Jedinica mjere</th>
              <th>Cijena usluge</th>
			        <th>Opis</th>
              <th>Obriši</th>
              </tr>
            </thead>
            <tbody id="myTable">   
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
                <tr id="<?php echo $row['SIFRA']; ?>">
			          <td><?php echo $row['SIFRA']; ?></td>
                <td data-target="NAZIV"><?php echo $row['NAZIV']; ?></td>
                <td data-target="JMERE"><?php echo $row['JMERE']; ?></td>
                <td data-target="PRODCEN"><?php echo $row['PRODCEN']; ?></td>
                <td data-target="OPIS"><?php echo $row['OPIS']; ?></td>
      <td><input type="checkbox" name="SIFRA" class="delete_customer" value="<?php echo $row["SIFRA"]; ?>" /></td>
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
