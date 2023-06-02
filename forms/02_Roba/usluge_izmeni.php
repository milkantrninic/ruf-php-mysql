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
    font-weight: bold; font-size: large;">Izmjeni red klikom na "Izmjeni"</h3><br />  
       
  <table class="table">
            <thead class="thead-dark" style="color:white;">
              <tr>
			  <th>Šifra</th>
              <th>Naziv</th>
              <th>Jedinica mjere</th>
              <th>Cijena usluge</th>
			  <th>Opis</th>
			  <th>Klikni na izmjeni</th>
              </tr>
            </thead>
            <tbody id="myTable">   
      <?php
          $table  = mysqli_query($link ,'SELECT SIFRA, BARCODE, NAZIV, JMERE, TARGR, NABCEN, PRODCEN, POPKOL, ULAZ, IZLAZ, ZALIHA, OPIS FROM MdArt WHERE USLUGA = 1 ORDER BY SIFRA');
          while($row  = mysqli_fetch_array($table)){ ?>

              <tr id="<?php echo $row['SIFRA']; ?>">
			          <td><?php echo $row['SIFRA']; ?></td>
                <td data-target="NAZIV"><?php echo $row['NAZIV']; ?></td>
                <td data-target="JMERE"><?php echo $row['JMERE']; ?></td>
                <td data-target="PRODCEN"><?php echo $row['PRODCEN']; ?></td>
                <td data-target="OPIS"><?php echo $row['OPIS']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['SIFRA'] ;?>">Izmjeni</a></td>
              </tr>
                
         <?php }
       ?>
      </tbody>   
  </table>
  
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
                <input type="text" id="NAZIV" class="form-control">
              </div>
			  
			  <div class="form-group">
                <label>Jedinica mjere</label>
                <input type="text" id="JMERE" class="form-control">
              </div>
			  
			  <div class="form-group">
                <label>Cijena usluge</label>
                <input type="text" id="PRODCEN" class="form-control">
              </div>
			  
			  <div class="form-group">
                <label>OPIS</label>
                <input type="text" id="OPIS" class="form-control">
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
            var NAZIV  = $('#'+id).children('td[data-target=NAZIV]').text();
            var JMERE  = $('#'+id).children('td[data-target=JMERE]').text();
            var PRODCEN  = $('#'+id).children('td[data-target=PRODCEN]').text();
            var OPIS  = $('#'+id).children('td[data-target=OPIS]').text();
            

            $('#NAZIV').val(NAZIV);
            $('#JMERE').val(JMERE);
            $('#PRODCEN').val(PRODCEN);
            $('#OPIS').val(OPIS);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
          var NAZIV =  $('#NAZIV').val();
          var JMERE =  $('#JMERE').val();
          var PRODCEN =  $('#PRODCEN').val();
          var OPIS =   $('#OPIS').val();

          $.ajax({
              url      : 'izmeni.php',
              method   : 'post', 
              data     : {
                          NAZIV : NAZIV , 
                          JMERE: JMERE , 
                          PRODCEN : PRODCEN , 
                          OPIS : OPIS ,
                          id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=NAZIV]').text(NAZIV);
                             $('#'+id).children('td[data-target=JMERE]').text(JMERE);
                             $('#'+id).children('td[data-target=PRODCEN]').text(PRODCEN);
                             $('#'+id).children('td[data-target=OPIS]').text(OPIS);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>


</html>
