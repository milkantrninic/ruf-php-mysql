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
<?php $thisPage="Firma"; ?>


<?php include("../../header_forms.php");?>
<div class="container d-flex justify-content-around">
 <div class="col-lg-11 tcontainer " style="height:100%; padding-left: 5px;">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold; font-size: large;">Izmjeni red klikom na "Izmjeni"</h3><br />  
       
  <table class="table table-striped">
  <thead class="thead-dark" style="color:white;">
      <tr>
        <th>Naziv</th>
        <th>Mjesto</th>
        <th>Ulica</th>
        <th>Klikni na izmjeni</th>
      </tr>
      </thead>
      <tbody id="myTable">
      <?php
          $table  = mysqli_query($link ,'SELECT * FROM firma order by sifra');
          while($row  = mysqli_fetch_array($table)){ ?>

              <tr id="<?php echo $row['sifra']; ?>">
                <td data-target="naziv"><?php echo $row['naziv']; ?></td>
                <td data-target="mjesto"><?php echo $row['mjesto']; ?></td>
                <td data-target="ulica"><?php echo $row['ulica']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['sifra'] ;?>">Izmjeni</a></td>
              </tr>
                
         <?php }
       ?>
      </tbody>   
  </table>
  
</div>
    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Izmjeni podatke</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Naziv</label>
                <input type="text" id="naziv" class="form-control">
              </div>
              <div class="form-group">
                <label>Mjesto</label>
                <input type="text" id="mjesto" class="form-control">
              </div>

               <div class="form-group">
                <label>Ulica</label>
                <input type="text" id="ulica" class="form-control">
              </div>
                <input type="hidden" id="userId" class="form-control">


          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Sačuvaj</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Zatvori</button>
          </div>
        </div>

      </div>
    </div>

</body>

<script>
  $(document).ready(function(){

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var naziv  = $('#'+id).children('td[data-target=naziv]').text();
            var mjesto  = $('#'+id).children('td[data-target=mjesto]').text();
            var ulica  = $('#'+id).children('td[data-target=ulica]').text();

            $('#naziv').val(naziv);
            $('#mjesto').val(mjesto);
            $('#ulica').val(ulica);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
         var naziv =  $('#naziv').val();
          var mjesto =  $('#mjesto').val();
          var ulica =   $('#ulica').val();

          $.ajax({
              url      : 'izmeni_firma.php',
              method   : 'post', 
              data     : {naziv : naziv , mjesto: mjesto , ulica : ulica , id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=naziv]').text(naziv);
                             $('#'+id).children('td[data-target=mjesto]').text(mjesto);
                             $('#'+id).children('td[data-target=ulica]').text(ulica);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>


</html>
