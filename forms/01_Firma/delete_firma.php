<?php session_start();
    
    if ($_SESSION['id']) {
        
        $LoginMessage="Odjavi se!";
        
    } else {
        
        header("Location: ../../index.php");
        
    }
?>

<?php
include '../../config.php';

$query = "SELECT * FROM firma order by sifra";
$result = mysqli_query($link, $query);
?>
<?php $thisPage="Firma"; ?>

 <?php include("../../header_forms.php");?>
 <div class="container d-flex justify-content-around">
 <div class="col-lg-11 tcontainer " style="height:100%; padding-left: 5px;">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold;">Selektujte redove koje hoćete da obrišete</h3><br />
   <?php
   if(mysqli_num_rows($result) > 0)
   {
   ?>
   <div class="table table-striped">
    <table class="table table-bordered">
    <thead class="thead-dark" style="color:white;">
     <tr>
      <th>Sifra</th>
      <th>Naziv</th>
      <th>Mjesto</th>
      <th>Ulica</th>
      <th>Kontakt</th>
      <th>Delete</th>
     </tr>
     </thead>
     <tbody id="myTable">
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
     <tr id="<?php echo $row["sifra"]; ?>" >
      <td><?php echo $row["sifra"]; ?></td>
      <td><?php echo $row["naziv"]; ?></td>
      <td><?php echo $row["mjesto"]; ?></td>
      <td><?php echo $row["ulica"]; ?></td>
      <td><?php echo $row["kontakt"]; ?></td>
      <td><input type="checkbox" name="sifra" class="delete_customer" value="<?php echo $row["sifra"]; ?>" /></td>
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
    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-info" >Delete</button>
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