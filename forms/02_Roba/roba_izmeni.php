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
<div class="container d-flex justify-content-around" style="max-width:100%;">
 <div class="col-lg-11 tcontainer " style="height:100%; padding: 0 25px 0 5px;">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold; font-size: large;">Izmjeni red klikom na "Izmjeni"</h3><br />  
       
  <table class="table table-striped">
  <thead class="thead-dark" style="color:white;">
              <tr>
              <th>SIFRA</th>
              <th>BARKOD</th>
              <th >NAZIV</th>
              <th>J.&nbsp;MJERE</th>
              <th>PDV</th>
              <th>NABAVNA CIJENA</th>
              <th>PRODAJNA CIJENA</th>
              <th>POP.&nbsp;KOL.</th>
              <th>ULAZ</th>
              <th>IZLAZ</th>
              <th>ZALIHA</th>
              <th style="width:5%;">IZMJENI PODATKE</th>
              </tr>
            </thead>
            <tbody id="myTable">   
      <?php
          $table  = mysqli_query($link ,'SELECT * FROM MdArt WHERE USLUGA <> 1 ORDER BY SIFRA');
          while($row  = mysqli_fetch_array($table)){ ?>

              <tr id="<?php echo $row['SIFRA']; ?>">
               <td data-target="SIFRA"><?php echo $row['SIFRA']; ?></td>
                <td data-target="BARCODE"><?php echo $row['BARCODE']; ?></td>
                <td data-target="NAZIV"><?php echo $row['NAZIV']; ?></td>
                <td data-target="JMERE"><?php echo $row['JMERE']; ?></td>
                <td data-target="TARGR"><?php echo $row['TARGR']; ?></td>
                <td data-target="NABCEN"><?php echo $row['NABCEN']; ?></td>
                <td data-target="PRODCEN"><?php echo $row['PRODCEN']; ?></td>
                <td data-target="POPKOL"><?php echo $row['POPKOL']; ?></td>
                <td data-target="ULAZ"><?php echo $row['ULAZ']; ?></td>
                <td data-target="IZLAZ"><?php echo $row['IZLAZ']; ?></td>
                <td data-target="ZALIHA"><?php echo $row['ZALIHA']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['SIFRA'] ;?>">Izmjeni</a></td>
              </tr>
                
         <?php }
       ?>
      </tbody>   
  </table>
  
</div>
</div>


    <!-- Modal -->
    <div id="myModal" class="modal fade mw-100 p-3" role="dialog">
        <div class="modal-dialog" style="max-width: 75%;">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header d-flex flex-row justify-content-between">
            <h4 class="modal-title">Izmjeni podatke</h4>
            <button type="button" class="close1"  data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body d-flex flex-row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Barcode</label>
                  <input type="text" id="BARCODE" class="form-control">
                </div>
                <div class="form-group">
                  <label>Naziv</label>
                  <input type="text" id="NAZIV" class="form-control">
                </div>

                 <div class="form-group">
                  <label>Jedinica mjere</label>
                  <input type="text" id="JMERE" class="form-control">
                </div>
                <div class="form-group">
                  <label>PDV</label>
                  <input type="text" id="TARGR" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nabavna cijena</label>
                  <input type="text" id="NABCEN" class="form-control">
                </div>
                <div class="form-group">
                  <label>Prodajna cijena</label>
                  <input type="text" id="PRODCEN" class="form-control">
                </div>
              </div>
              <div class="w-100"></div>
               <div class="col-lg-6">
              <div class="form-group">
                <label>Popust na količinu</label>
                <input type="text" id="POPKOL" class="form-control">
              </div>
              <div class="form-group">
                <label>Ulaz</label>
                <input type="text" id="ULAZ" class="form-control">
              </div>
              <div class="form-group">
                <label>Izlaz</label>
                <input type="text" id="IZLAZ" class="form-control">
              </div>
              <div class="form-group">
                <label>Zaliha</label>
                <input type="text" id="ZALIHA" class="form-control">
              </div>
                <input type="hidden" id="userId" class="form-control">
            </div>

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
            var BARCODE  = $('#'+id).children('td[data-target=BARCODE]').text();
            var NAZIV  = $('#'+id).children('td[data-target=NAZIV]').text();
            var JMERE  = $('#'+id).children('td[data-target=JMERE]').text();
            var TARGR  = $('#'+id).children('td[data-target=TARGR]').text();
            var NABCEN  = $('#'+id).children('td[data-target=NABCEN]').text();
            var PRODCEN  = $('#'+id).children('td[data-target=PRODCEN]').text();
            var POPKOL  = $('#'+id).children('td[data-target=POPKOL]').text();
            var ULAZ  = $('#'+id).children('td[data-target=ULAZ]').text();
            var IZLAZ  = $('#'+id).children('td[data-target=IZLAZ]').text();
            var ZALIHA  = $('#'+id).children('td[data-target=ZALIHA]').text();
            console.log($('#myModal'))
            $('#BARCODE').val(BARCODE);
            $('#NAZIV').val(NAZIV);
            $('#JMERE').val(JMERE);
            $('#TARGR').val(TARGR);
            $('#NABCEN').val(NABCEN);
            $('#PRODCEN').val(PRODCEN);
            $('#POPKOL').val(POPKOL);
            $('#ULAZ').val(ULAZ);
            $('#IZLAZ').val(IZLAZ);
            $('#ZALIHA').val(ZALIHA);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
          var BARCODE =  $('#BARCODE').val();
          var NAZIV =  $('#NAZIV').val();
          var JMERE =   $('#JMERE').val();
          var TARGR =   $('#TARGR').val();
          var NABCEN =   $('#NABCEN').val();
          var PRODCEN =   $('#PRODCEN').val();
          var POPKOL =   $('#POPKOL').val();
          var ULAZ =   $('#ULAZ').val();
          var IZLAZ =   $('#IZLAZ').val();
          var ZALIHA =   $('#ZALIHA').val();

          $.ajax({
              url      : 'izmeni_firma.php',
              method   : 'post', 
              data     : {
                          BARCODE : BARCODE , 
                          NAZIV: NAZIV , 
                          JMERE : JMERE , 
                          TARGR : TARGR ,
                          NABCEN : NABCEN ,
                          PRODCEN : PRODCEN ,
                          POPKOL : POPKOL ,
                          ULAZ : ULAZ ,
                          IZLAZ : IZLAZ ,
                          ZALIHA : ZALIHA ,
                          id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=BARCODE]').text(BARCODE);
                             $('#'+id).children('td[data-target=NAZIV]').text(NAZIV);
                             $('#'+id).children('td[data-target=JMERE]').text(JMERE);
                             $('#'+id).children('td[data-target=TARGR]').text(TARGR);
                             $('#'+id).children('td[data-target=NABCEN]').text(NABCEN);
                             $('#'+id).children('td[data-target=PRODCEN]').text(PRODCEN);
                             $('#'+id).children('td[data-target=POPKOL]').text(POPKOL);
                             $('#'+id).children('td[data-target=ULAZ]').text(ULAZ);
                             $('#'+id).children('td[data-target=IZLAZ]').text(IZLAZ);
                             $('#'+id).children('td[data-target=ZALIHA]').text(ZALIHA);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>


</html>
