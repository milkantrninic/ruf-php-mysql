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
<?php $thisPage="Roba"; ?>


<?php include("../../header_forms.php");?>
<div class="container">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold; font-size: large;">Izmjeni red klikom na "Izmjeni"</h3><br />  
       
  <table class="table">
  <thead class="thead-dark" style="color:white;">
              <tr>
              <th>Barkod</th>
              <th>Naziv</th>
              <th>J. mjere</th>
              <th>Tar. gr</th>
              <th>Nabavna cijena</th>
              <th>Prodajna cijena</th>
              <th>Pop. kol.</th>
              <th>Ulaz</th>
              <th>Izlaz</th>
              <th>Zaliha</th>
              <th>Izmjeni podatke</th>
              </tr>
            </thead>
      <tbody>
      <?php
          $table  = mysqli_query($link ,'SELECT sifra, barcode, naziv, jmere, targr, nabcen, prodcen, popkol, ulaz, izlaz, zaliha FROM artikli ORDER BY sifra');
          while($row  = mysqli_fetch_array($table)){ ?>

              <tr id="<?php echo $row['sifra']; ?>">
                <td data-target="barcode"><?php echo $row['barcode']; ?></td>
                <td data-target="naziv"><?php echo $row['naziv']; ?></td>
                <td data-target="jmere"><?php echo $row['jmere']; ?></td>
                <td data-target="targr"><?php echo $row['targr']; ?></td>
                <td data-target="nabcen"><?php echo $row['nabcen']; ?></td>
                <td data-target="prodcen"><?php echo $row['prodcen']; ?></td>
                <td data-target="popkol"><?php echo $row['popkol']; ?></td>
                <td data-target="ulaz"><?php echo $row['ulaz']; ?></td>
                <td data-target="izlaz"><?php echo $row['izlaz']; ?></td>
                <td data-target="zaliha"><?php echo $row['zaliha']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['sifra'] ;?>">Izmjeni</a></td>
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
                <label>Barcode</label>
                <input type="text" id="barcode" class="form-control">
              </div>
              <div class="form-group">
                <label>Naziv</label>
                <input type="text" id="naziv" class="form-control">
              </div>

               <div class="form-group">
                <label>Jedinica mjere</label>
                <input type="text" id="jmere" class="form-control">
              </div>
              <div class="form-group">
                <label>Tara</label>
                <input type="text" id="targr" class="form-control">
              </div>
              <div class="form-group">
                <label>Nabavna cijena</label>
                <input type="text" id="nabcen" class="form-control">
              </div>
              <div class="form-group">
                <label>Prodajna cijena</label>
                <input type="text" id="prodcen" class="form-control">
              </div>
              <div class="form-group">
                <label>Popust na količinu</label>
                <input type="text" id="popkol" class="form-control">
              </div>
              <div class="form-group">
                <label>Ulaz</label>
                <input type="text" id="ulaz" class="form-control">
              </div>
              <div class="form-group">
                <label>Izlaz</label>
                <input type="text" id="izlaz" class="form-control">
              </div>
              <div class="form-group">
                <label>Zaliha</label>
                <input type="text" id="zaliha" class="form-control">
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
            var barcode  = $('#'+id).children('td[data-target=barcode]').text();
            var naziv  = $('#'+id).children('td[data-target=naziv]').text();
            var jmere  = $('#'+id).children('td[data-target=jmere]').text();
            var targr  = $('#'+id).children('td[data-target=targr]').text();
            var nabcen  = $('#'+id).children('td[data-target=nabcen]').text();
            var prodcen  = $('#'+id).children('td[data-target=prodcen]').text();
            var popkol  = $('#'+id).children('td[data-target=popkol]').text();
            var ulaz  = $('#'+id).children('td[data-target=ulaz]').text();
            var izlaz  = $('#'+id).children('td[data-target=izlaz]').text();
            var zaliha  = $('#'+id).children('td[data-target=zaliha]').text();

            $('#barcode').val(barcode);
            $('#naziv').val(naziv);
            $('#jmere').val(jmere);
            $('#targr').val(targr);
            $('#nabcen').val(nabcen);
            $('#prodcen').val(prodcen);
            $('#popkol').val(popkol);
            $('#ulaz').val(ulaz);
            $('#izlaz').val(izlaz);
            $('#zaliha').val(zaliha);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
          var barcode =  $('#barcode').val();
          var naziv =  $('#naziv').val();
          var jmere =   $('#jmere').val();
          var targr =   $('#targr').val();
          var nabcen =   $('#nabcen').val();
          var prodcen =   $('#prodcen').val();
          var popkol =   $('#popkol').val();
          var ulaz =   $('#ulaz').val();
          var izlaz =   $('#izlaz').val();
          var zaliha =   $('#zaliha').val();

          $.ajax({
              url      : 'izmeni_firma.php',
              method   : 'post', 
              data     : {
                          barcode : barcode , 
                          naziv: naziv , 
                          jmere : jmere , 
                          targr : targr ,
                          nabcen : nabcen ,
                          prodcen : prodcen ,
                          popkol : popkol ,
                          ulaz : ulaz ,
                          izlaz : izlaz ,
                          zaliha : zaliha ,
                          id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=barcode]').text(barcode);
                             $('#'+id).children('td[data-target=naziv]').text(naziv);
                             $('#'+id).children('td[data-target=jmere]').text(jmere);
                             $('#'+id).children('td[data-target=targr]').text(targr);
                             $('#'+id).children('td[data-target=nabcen]').text(nabcen);
                             $('#'+id).children('td[data-target=prodcen]').text(prodcen);
                             $('#'+id).children('td[data-target=popkol]').text(popkol);
                             $('#'+id).children('td[data-target=ulaz]').text(ulaz);
                             $('#'+id).children('td[data-target=izlaz]').text(izlaz);
                             $('#'+id).children('td[data-target=zaliha]').text(zaliha);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>


</html>
