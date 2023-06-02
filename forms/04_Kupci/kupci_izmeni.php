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
<?php $thisPage="Kupci"; ?>


<?php include("../../header_forms.php");?>
<div class="container">
   <br />
   <h3 style="text-transform: uppercase;
    text-align: center;
    font-weight: bold; font-size: large;">Izmjeni red klikom na "Izmjeni"</h3><br />  
       
  <table class="table">
            <thead class="thead-dark" style="color:white;">
              <tr>
                <th>SIFRA</th>
                <th>NAZIV</th>
                <th>NAZIV&nbsp;2</th>
                <th>ULICA</th>
                <th>ULICA&nbsp;2</th>
                <th>PTT</th>
                <th>MESTO</th>
                <th>ZIRO</th>
                <th>PIB</th>
                <th>PEPDV</th>
                <th>TEL</th>
                <th>KONTAKT</th>
                <th>KONTAKT&nbsp;2</th>
                <th>RABAT</th>
                <th>MEMO</th>
                <th>IZMJENI</th>
              </tr>
            </thead>
            <tbody id="myTable">   
      <?php
          $table  = mysqli_query($link ,'SELECT * FROM MdDob ORDER BY SIFRA');
          while($row  = mysqli_fetch_array($table)){ ?>

              <tr id="<?php echo $row['SIFRA']; ?>">
			          <td><?php echo $row['SIFRA']; ?></td>
                <td data-target="NAZIV"><?php echo $row['NAZIV']; ?></td>
                <td data-target="NAZIVPLUS"><?php echo $row['NAZIVPLUS']; ?></td>
                <td data-target="ULICA"><?php echo $row['ULICA']; ?></td>
                <td data-target="ULICAPLUS"><?php echo $row['ULICAPLUS']; ?></td>
                <td data-target="PTT"><?php echo $row['PTT']; ?></td>
                <td data-target="MESTO"><?php echo $row['MESTO']; ?></td>
                <td data-target="ZIRO"><?php echo $row['ZIRO']; ?></td>
                <td data-target="PIB"><?php echo $row['PIB']; ?></td>
                <td data-target="PEPDV"><?php echo $row['PEPDV']; ?></td>
                <td data-target="TEL"><?php echo $row['TEL']; ?></td>
                <td data-target="KONTAKT"><?php echo $row['KONTAKT']; ?></td>
                <td data-target="KD"><?php echo $row['KD']; ?></td>
                <td data-target="RABAT"><?php echo $row['RABAT']; ?></td>
                <td data-target="MEMO"><?php echo $row['MEMO']; ?></td>
                
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
                <label>Naziv 2</label>
                <input type="text" id="NAZIVPLUS" class="form-control">
              </div>
			  
			  <div class="form-group">
                <label>Ulica</label>
                <input type="text" id="ULICA" class="form-control">
              </div>
			  
			  <div class="form-group">
                <label>Ulica 2</label>
                <input type="text" id="ULICAPLUS" class="form-control">
              </div>

              <div class="form-group">
                <label>PTT</label>
                <input type="text" id="PTT" class="form-control">
              </div>

              <div class="form-group">
                <label>Mjesto</label>
                <input type="text" id="MESTO" class="form-control">
              </div>

              <div class="form-group">
                <label>Tekuci racun</label>
                <input type="text" id="ZIRO" class="form-control">
              </div>

              <div class="form-group">
                <label>PIB</label>
                <input type="text" id="PIB" class="form-control">
              </div>

              <div class="form-group">
                <label>JIB</label>
                <input type="text" id="PEPDV" class="form-control">
              </div>

              <div class="form-group">
                <label>Broj telefona</label>
                <input type="text" id="TEL" class="form-control">
              </div>

              <div class="form-group">
                <label>Kontakt</label>
                <input type="text" id="KONTAKT" class="form-control">
              </div>

              <div class="form-group">
                <label>Kontakt 2</label>
                <input type="text" id="KD" class="form-control">
              </div>

              <div class="form-group">
                <label>Rabat</label>
                <input type="text" id="RABAT" class="form-control">
              </div>

              <div class="form-group">
                <label>Dodatne informacije</label>
                <input type="text" id="MEMO" class="form-control">
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
            var NAZIVPLUS  = $('#'+id).children('td[data-target=NAZIVPLUS]').text();
            var ULICA  = $('#'+id).children('td[data-target=ULICA]').text();
            var ULICAPLUS  = $('#'+id).children('td[data-target=ULICAPLUS]').text();
            var PTT  = $('#'+id).children('td[data-target=PTT]').text();
            var MESTO  = $('#'+id).children('td[data-target=MESTO]').text();
            var ZIRO  = $('#'+id).children('td[data-target=ZIRO]').text();
            var PIB  = $('#'+id).children('td[data-target=PIB]').text();
            var PEPDV  = $('#'+id).children('td[data-target=PEPDV]').text();
            var TEL  = $('#'+id).children('td[data-target=TEL]').text();
            var KONTAKT  = $('#'+id).children('td[data-target=KONTAKT]').text();
            var KD  = $('#'+id).children('td[data-target=KD]').text();
            var RABAT  = $('#'+id).children('td[data-target=RABAT]').text();
            var MEMO  = $('#'+id).children('td[data-target=MEMO]').text();
            

            $('#NAZIV').val(NAZIV);
            $('#NAZIVPLUS').val(NAZIVPLUS);
            $('#ULICA').val(ULICA);
            $('#ULICAPLUS').val(ULICAPLUS);
            $('#PTT').val(PTT);
            $('#MESTO').val(MESTO);
            $('#ZIRO').val(ZIRO);
            $('#PIB').val(PIB);
            $('#PEPDV').val(PEPDV);
            $('#TEL').val(TEL);
            $('#KONTAKT').val(KONTAKT);
            $('#KD').val(KD);
            $('#RABAT').val(RABAT);
            $('#MEMO').val(MEMO);

            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
          var NAZIV =  $('#NAZIV').val();
          var NAZIVPLUS =  $('#NAZIVPLUS').val();
          var ULICA =  $('#ULICA').val();
          var ULICAPLUS =   $('#ULICAPLUS').val();
          var PTT =   $('#PTT').val();
          var MESTO =   $('#MESTO').val();
          var ZIRO =   $('#ZIRO').val();
          var PIB =   $('#PIB').val();
          var PEPDV =   $('#PEPDV').val();
          var TEL =   $('#TEL').val();
          var KONTAKT =   $('#KONTAKT').val();
          var KD =   $('#KD').val();
          var RABAT =   $('#RABAT').val();
          var MEMO =   $('#MEMO').val();

          $.ajax({
              url      : 'izmeni.php',
              method   : 'post', 
              data     : {
                          NAZIV : NAZIV , 
                          NAZIVPLUS: NAZIVPLUS , 
                          ULICA : ULICA , 
                          ULICAPLUS : ULICAPLUS ,
                          PTT : PTT ,
                          MESTO : MESTO ,
                          ZIRO : ZIRO ,
                          PIB : PIB ,
                          PEPDV : PEPDV ,
                          TEL : TEL ,
                          KONTAKT : KONTAKT ,
                          KD : KD ,
                          RABAT : RABAT ,
                          MEMO : MEMO ,
                          id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=NAZIV]').text(NAZIV);
                             $('#'+id).children('td[data-target=NAZIVPLUS]').text(NAZIVPLUS);
                             $('#'+id).children('td[data-target=ULICA]').text(ULICA);
                             $('#'+id).children('td[data-target=ULICAPLUS]').text(ULICAPLUS);
                             $('#'+id).children('td[data-target=PTT]').text(PTT);
                             $('#'+id).children('td[data-target=MESTO]').text(MESTO);
                             $('#'+id).children('td[data-target=ZIRO]').text(ZIRO);
                             $('#'+id).children('td[data-target=PIB]').text(PIB);
                             $('#'+id).children('td[data-target=PEPDV]').text(PEPDV);
                             $('#'+id).children('td[data-target=TEL]').text(TEL);
                             $('#'+id).children('td[data-target=KONTAKT]').text(KONTAKT);
                             $('#'+id).children('td[data-target=KD]').text(KD);
                             $('#'+id).children('td[data-target=RABAT]').text(RABAT);
                             $('#'+id).children('td[data-target=MEMO]').text(MEMO);

                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>


</html>
