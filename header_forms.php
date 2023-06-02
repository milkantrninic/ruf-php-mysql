

<!DOCTYPE html>
<html lang="sr">
 <head>
   
  <title>Pretraži firme</title>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css"  href="../../css/style.css">
  <!-- <link rel="stylesheet" type="text/css"  href="../../css/table.css"> -->
  <link rel="stylesheet" type="text/css"  href="../../css/all.css">
  <script type=“text/javascript” src="/js/custom.js"></script>
  <!--<script type=“text/javascript” src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
  <script type=“text/javascript” src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<!-- <script type=“text/javascript” src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

  
 </head>
 <body>

<header id="header">

       
         <ul class="nav nav-tabs  text-uppercase  font-weight-bold justify-content-start h6"  id="myDIV">
                <li class="nav-item active btn2 <?php if ($thisPage=="Firma") 
                    echo "active2"; ?>" onclick="openGroup('firma')">
                    <a class="nav-link " style="<?php if ($thisPage=="Firma") 
                    echo "color:black;"; ?>" href="/forms/01_Firma/search_firma.php"><i class="fa fa-home icon2" aria-hidden="true"></i><p>Firma</p></a>
                </li>
                <li class="nav-item active btn2 <?php if ($thisPage=="Roba") 
                echo "active2"; ?>" onclick="openGroup('roba')">
                  <a class="nav-link" style="<?php if ($thisPage=="Roba") 
                    echo "color:black;"; ?>" href="/forms/02_Roba/search_roba.php"><i class="fa fa-cart-plus icon2" aria-hidden="true"></i><p>Roba</p></a>
                </li>
                <li class="nav-item active btn2 <?php if ($thisPage=="Usluge") 
                echo "active2"; ?>" onclick="openGroup('usluge')">
                        <a class="nav-link" style="<?php if ($thisPage=="Usluge") 
                    echo "color:black;"; ?>" href="/forms/03_Usluge/search_usluge.php"><i class="fa fa-wrench icon2" aria-hidden="true" ></i><p>Usluge</p></a>
                      </li>
                <li class="nav-item active btn2 <?php if ($thisPage=="Kupci") 
                echo "active2"; ?>" onclick="openGroup('kupci')">
                  <a class="nav-link" style="<?php if ($thisPage=="Kupci") 
                    echo "color:black;"; ?>" href="/forms/04_Kupci/search_kupci.php"><i class="fa fa-address-card icon2" aria-hidden="true" ></i><p>Kupci</p></a>
                </li>
                <li class="nav-item active btn2 <?php if ($thisPage=="Racuni") 
                echo "active2"; ?>" onclick="openGroup('racuni')">
                        <a class="nav-link" style="<?php if ($thisPage=="Racuni") 
                    echo "color:white; border: 2px solid #fff;"; ?>" href="/forms/05_Racun/search_racuni.php"><i class="fa fa-file-pdf icon2" aria-hidden="true" ></i><p>Računi</p></a>
                      </li>

               <li class="nav-item active btn2" onclick="openGroup('predracuni')">
                  <a class="nav-link" style="<?php if ($thisPage=="predracuni") 
                    echo "color:black; "; ?>" href="#"><i class="fa fa-edit icon2" aria-hidden="true" ></i><p>Predračuni</p></a>
                </li>
                <li class="nav-item active btn2" onclick="openGroup('otpremnice')">
                        <a class="nav-link" style="<?php if ($thisPage=="otpremnice") 
                    echo "color:black;"; ?>" href="#"><i class="fa fa-edit icon2" aria-hidden="true" ></i><p>Otpremnice</p></a>
                      </li>
                      <li class="nav-item active btn2" onclick="openGroup('otpremnice')">
                        <a class="nav-link" style="<?php if ($thisPage=="otpremnice") 
                    echo "color:black;"; ?>" href="#"><i class="fa fa-edit icon2" aria-hidden="true" ></i><p>Podesi</p></a>
                      </li>
                            

              </ul>
                <script>
                                // Get the container element
                    var btnContainer = document.getElementById("myDIV");

                    // Get all buttons with class="btn" inside the container
                    var btns = btnContainer.getElementsByClassName("btn2");

                    // Loop through the buttons and add the active class to the current/clicked button
                    for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active2");
                        current[0].className = current[0].className.replace(" active2", "");
                        this.className += " active2";
                    });
                    }
                </script> 

<input type="text" class="form-control" style="width: 10%; margin: 7px auto;" id="myInput" aria-controls="myTable" placeholder="Pretrazi tabelu.." title="Type in a name"> <a href="/index.php?logout" style="width: auto; padding: 14px; border: 0;"><?php echo $LoginMessage." ".$_SESSION['id']; ?> </a>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> 


</header>   

<section id="leftsidebar">
    <!--Firma-->
    <article id="firma" class="group" <?php if ($thisPage=="Firma") 
        { echo htmlspecialchars('style=display:block;');} 
        else {echo htmlspecialchars('style=display:none;');}
        ?>>
        <!--Firma-->
        <a href="/forms/01_Firma/search_firma.php"><div name="search_firma" id="firma-pretrazi" class="leftnav"><div class="icon_container"><i class="fa fa-search icon"></i></div><div class="left_nav_text"  >Pretrazi</div></div></a>
        
        <a href="/forms/01_Firma/firma_dodaj.php"><div id="firma-stampaj" class="leftnav" ><div class="icon_container"><i class="fa fa-plus icon"></i></div><div class="left_nav_text">Dodaj</div></div></a>

        <a href="/forms/01_Firma/firma_izmeni.php"><div id="firma-izmeni" class="leftnav" ><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmeni</div></div></a>

        <a href="/forms/01_Firma/delete_firma.php"> <div  id="firma-brisi" class="leftnav"><div class="icon_container" ><i class="fa fa-trash-alt icon"></i></div><div class="left_nav_text">Obrisi</div></Div></a>

        <div id="firma-print" class="leftnav"><div class="icon_container"><i class="fa fa-print icon"></i></div><div class="left_nav_text">Štampaj</div></div>

        <div id="firam-refresh" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži</div></div>

         <div class="dropdown">
                <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-home icon"></i></div><div class="left_nav_text">Poslovne godine</div></div>
                <div class="dropdown-content">
                    <a href="#">Promena poslovne godine</a>
                    <a href="#">Nova poslovna godine</a>
                </div>
            </div>
            
    </article>
    <!--Roba-->
    <article id="roba" class="group"  <?php if ($thisPage=="Roba") 
        { echo htmlspecialchars('style=display:block;');} 
        else {echo htmlspecialchars('style=display:none;');}
        ?>>
        <!-- <div class="blue-tab"><h2>Roba</h2></div> -->
        <a href="/forms/02_Roba/search_roba.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-search icon"></i></div><div class="left_nav_text">Pretraži robu</div></div></a>

        <div class="dropdown">
        <a href="/forms/02_Roba/roba_dodaj.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-plus icon"></i></div><div class="left_nav_text">Dodaj</div></div></a>
        </div>
        <div class="dropdown">
            <a href="/forms/02_Roba/roba_izmeni.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmeni robu</div></div></a>
                    <div class="dropdown-content">
                                <a href="/forms/02_Roba/roba_izmeni.php" class="dropdownL2 ">
                                    <div class="dropdown-contentL2">Ulaz</div> 
                                </a>
                            <div class="dropdownL2">
                                 <a href="#" class="dropdown-contentL2">Stopu PDV-a</a>
                            </div>    
                            <div class="dropdownL2">
                                <a href="#" class="dropdown-contentL2">BarCode</a>
                                <div class="dropdown-contentL2"><a href="#">Ukloni vodece nule sa sifre</a></div>
                                <div class="dropdown-contentL2"><a href="#">Dodaj vodece nule na sifru</a></div>
                            </div>
                            <div class="dropdownL2">
                                <a href="#" class="dropdown-contentL2">Naziv</a>
                                <div class="dropdown-contentL2"><a href="#">Svi opisi pocetnim velikim slovima</a></div>
                                <div class="dropdown-contentL2"><a href="#">Svi opisi velikim slovima</a></div>
                                <div class="dropdown-contentL2"><a href="#">Svi opisi malim slovima</a></div>
                            </div>
                            <div class="dropdownL2">
                                <a href="#" class="dropdown-contentL2">Prodajnu cijenu</a>
                                <div class="dropdown-contentL2"><a href="#">Primeri (pogledati)</a></div>
                                <div class="dropdown-contentL2"><a href="#">po koeficijentu</a></div>
                                <div class="dropdown-contentL2"><a href="#">Procentualno</a></div>
                                <div class="dropdown-contentL2"><a href="#">Vrijedonosno</a></div>
                            </div>  
                              
                    </div>
             </div>
        </div>   
        <a href="/forms/02_Roba/delete_roba.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-trash-alt icon"></i></div><div class="left_nav_text">Briši robu</div></div></a>

        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-cut icon"></i></div><div class="left_nav_text">Prenesi</div></div>
        <div class="dropdown">
            <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-print icon"></i></div><div class="left_nav_text">Štampaj robu</div></div>
            <div class="dropdown-content">
                <a href="#">Karticu</a>
                <a href="#">Stanje zaliha</a>
                <a href="#">Stanje zaliha razlicito od nule</a>
            </div>
        </div>    
    
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži robu</div></div>
    
    </article>
    <!--Usluge-->
    <article id="usluge" class="group" <?php if ($thisPage=="Usluge") 
        { echo htmlspecialchars('style=display:block;');} 
        else {echo htmlspecialchars('style=display:none;');}
        ?>>
        <!-- <div class="blue-tab"><h2>Usluge</h2></div> -->
        <a href="/forms/03_Usluge/search_usluge.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-search icon"></i></div><div class="left_nav_text">Pretraži usluge</div></div></a>
		
        <a href="/forms/03_Usluge/usluga_dodaj.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-plus icon"></i></div><div class="left_nav_text">Dodaj uslugu</div></div></a>
        <div class="dropdown">
            <a href="/forms/03_Usluge/usluge_izmeni.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmjeni uslugu</div></div></a>
            <div class="dropdown-content">
					<div class="dropdownL2">
                        <a href="/forms/03_Usluge/usluge_izmeni.php">Izmjeni</a>
                    </div>
                     <div class="dropdownL2">
                        <a href="#">Stopu PDV-a</a>
                    </div>
                    <div class="dropdownL2">
                        <a href="#" class="dropdown-contentL2">Sifra</a>
                        <div class="dropdown-contentL2"><a href="#">Ukloni vodece nule sa sifre</a></div>
                        <div class="dropdown-contentL2"><a href="#">Dodaj vodece nule na sifru</a></div>
                    </div>
                    <div class="dropdownL2">
                        <a href="#" class="dropdown-contentL2">Opis</a>
                        <div class="dropdown-contentL2"><a href="#">Svi opisi pocetnim velikim slovima</a></div>
                        <div class="dropdown-contentL2"><a href="#">Svi opisi velikim slovima</a></div>
                        <div class="dropdown-contentL2"><a href="#">Svi opisi malim slovima</a></div>
                    </div>
                    
            </div>
        </div>   
        <a href="/forms/03_Usluge/delete_usluge.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-trash-alt icon"></i></div><div class="left_nav_text">Briši uslugu</div></div></a>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-cut icon"></i></div><div class="left_nav_text">Prenesi uslugu</div></div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-print icon"></i></div><div class="left_nav_text">Štampaj uslugu</div></div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži usluge</div></div>
    </article>
    <!--Kupci-->
    <article id="kupci" class="group" <?php if ($thisPage=="Kupci") 
        { echo htmlspecialchars('style=display:block;');} 
        else {echo htmlspecialchars('style=display:none;');}
        ?>>
        <!-- <div class="blue-tab"><h2>Kupci</h2></div> -->
        <a href="/forms/04_Kupci/search_kupci.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-search icon"></i></div><div class="left_nav_text">Pretraži kupce</div></div></a>
        <div class="dropdown">
            <a href="/forms/04_Kupci/kupci_dodaj.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-plus icon"></i></div><div class="left_nav_text">Dodaj kupce</div></div></a>
            <div class="dropdown-content">
                <a href="#">Uplata</a>
                <a href="#">Pocetno stanje</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="/forms/04_Kupci/kupci_izmeni.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmeni kupce</div></div></a>
            <div class="dropdown-content">
                <a href="#">Uplata</a>
                <a href="#">Pocetno stanje</a>
                <a href="#">Uklanjanje vodece nule sa sifre</a>
                <a href="#">Dodaj vodece nule na sifru</a>
            </div>
        </div>
        <div class="dropdown">   
            <a href="/forms/04_Kupci/delete_kupci.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-trash-alt icon"></i></div><div class="left_nav_text">Briši kupce</div></div></a>
            <div class="dropdown-content">
                <a href="#">Brisi sve</a>
                <a href="#">Brisi selektivno</a>
            </div>
        </div>
            <div class="dropdown">   
                <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-cut icon"></i></div><div class="left_nav_text">Prenesi kupce</div></div>
                <div class="dropdown-content">
                    <a href="#">Saldo kupca u pocetno stanje</a>
                </div>
            </div>
            <div class="dropdown"> 
                <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-print icon"></i></div><div class="left_nav_text">Štampaj kupce</div></div>
                <div class="dropdown-content">
                    <a href="#">Karticu</a>
                    <a href="#">Zbirnu karticu</a>
                </div>
            </div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži kupce</div></div>
    </article>
    <!--Racuni-->
        <article id="racuni" class="group" <?php if ($thisPage=="Racuni") 
        { echo htmlspecialchars('style=display:block;');} 
        else {echo htmlspecialchars('style=display:none;');}
        ?>>
        <!-- <div class="blue-tab"><h2>Racuni</h2></div> -->
        <div class="dropdown"> 
            <a href="/forms/05_Racun/search_racuni.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-search icon"></i></div><div class="left_nav_text">Pretraži racune</div></div></a>
            <div class="dropdown-content">
                <a href="#">Preostala dugovanja</a>
            </div>
        </div>
        <div class="dropdown"> 
            <a href="/forms/05_Racun/dodaj_racun.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-plus icon"></i></div><div class="left_nav_text">Dodaj racun</div></div></a>
            <div class="dropdown-content">
                <a href="#">Uplatu</a>
            </div>
        </div>
        <div class="dropdown"> 
            <a href="/forms/05_Racun/search_racuni.php"><div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmeni racun</div></div></a>
            <div class="dropdown-content">
                <a href="#">Uplatu</a>
            </div>
        </div>
        <div class="dropdown"> 
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-trash-alt icon"></i></div><div class="left_nav_text">Briši racun</div></div>
        <div class="dropdown-content">
            <a href="/forms/05_Racun/delete_racun.php">Brisi selektivno</a>
        </div>
    </div>
    
    <div class="dropdown">
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-print icon"></i></div><div class="left_nav_text">Štampaj racun</div></div>
        <div class="dropdown-content">
            <div class="dropdownL2">
                <a href="#" class="dropdown-contentL2">Rekapitulaciju</a>
                <div class="dropdown-contentL2"><a href="#" class="dropdown-contentL2">Rekapitulaciju po robi</a></div>
                <div class="dropdown-contentL2"><a href="#">Rekapitulaciju po robi(od broja do)</a></div>
                <div class="dropdown-contentL2"><a href="#">Rekapitulaciju po robi(za odabrane brojeve)</a></div>
                <a href="#">Knjigu izdatih racuna</a>
                <a href="#">Knjigu pausalnih obveznika</a>
            </div>
        </div>
    </div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži racune</div></div>
    </article>
    
    <!--Predracuni-->
    <article id="predracuni" class="group" style="display:none">
        <!-- <div class="blue-tab"><h2>Predracuni</h2></div> -->
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-search icon"></i></div><div class="left_nav_text">Pretraži predracune</div></div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-plus icon"></i></div><div class="left_nav_text">Dodaj predracun</div></div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmeni predracun</div></div>
        <div class="dropdown"> 
            <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-trash-alt icon"></i></div><div class="left_nav_text">Briši predracun</div></div>
            <div class="dropdown-content">
                <a href="#">Brisi sve</a>
                <a href="#">Brisi selektivno</a>
            </div>
        </div>
        <div class="dropdown">
            <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-print icon"></i></div><div class="left_nav_text">Štampaj predracun</div></div>
            <div class="dropdown-content">
                <div class="dropdownL2">
                    <a href="#" class="dropdown-contentL2">Rekapitulaciju</a>
                    <div class="dropdown-contentL2"><a href="#" class="dropdown-contentL2">Rekapitulaciju po robi</a></div>
                    <div class="dropdown-contentL2"><a href="#">Rekapitulaciju po robi(od broja do)</a></div>
                    <div class="dropdown-contentL2"><a href="#">Rekapitulaciju po robi(za odabrane brojeve)</a></div>
                </div>
            </div>
        </div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži predracune</div></div>
    </article>
    <!--Otpremnice-->
    <article id="otpremnice" class="group" style="display:none">
        <!-- <div class="blue-tab"><h2>Otpremnice</h2></div> -->
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-search icon"></i></div><div class="left_nav_text">Pretraži otpremnice</div></div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-plus icon"></i></div><div class="left_nav_text">Dodaj otpremnicu</div></div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmeni otpremnicu</div></div>
        <div class="dropdown"> 
            <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-trash-alt icon"></i></div><div class="left_nav_text">Briši otpremnicu</div></div>
            <div class="dropdown-content">
                <a href="#">Brisi sve</a>
                <a href="#">Brisi selektivno</a>
            </div>
        </div>
        <div class="dropdown">
            <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-print icon"></i></div><div class="left_nav_text">Štampaj otpremnicu</div></div>
            <div class="dropdown-content">
                <div class="dropdownL2">
                    <a href="#" class="dropdown-contentL2">Rekapitulaciju</a>
                    <div class="dropdown-contentL2"><a href="#" class="dropdown-contentL2">Rekapitulaciju po robi</a></div>
                    <div class="dropdown-contentL2"><a href="#">Rekapitulaciju po robi(od broja do)</a></div>
                    <div class="dropdown-contentL2"><a href="#">Rekapitulaciju po robi(za odabrane brojeve)</a></div>
                </div>
            </div>
        </div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži otrpemnice</div></div>
    </article>
    <!--Podesi-->
    <article id="podesi" class="group" style="display:none">
        <!-- <div class="blue-tab"><h2>Podesi</h2></div> -->
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-edit icon"></i></div><div class="left_nav_text">Izmeni</div></div>
        <div id="firma-aktiviraj" class="leftnav"><div class="icon_container"><i class="fa fa-recycle icon"></i></div><div class="left_nav_text">Osveži</div></div>
    </article>
    </section>
    


