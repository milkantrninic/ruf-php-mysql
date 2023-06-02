<?php
        if(!empty($_POST["otvori_fakturu"])){
           if(!empty($item)) {
                  if(in_array($productByCode[0]["NAZIV"],array_keys($item))) {
                    foreach($item as $k => $v) {
                        if($productByCode[0]["NAZIV"] == $k) {
                          if(empty($item[$k]["KOLICINA"])) {
                            $item[$k]["KOLICINA"] = 0;
                          }
                          $item[$k]["KOLICINA"] += $_POST["KOLICINA"];
                          $upd_art = $_GET["NAZIV"];
                         $upd_art1 =" UPDATE `RN$racun` SET KOLICINA = '".$item[$k]["KOLICINA"]."' WHERE NAZART = '".$upd_art."'";
                         $azurirano = $db_handle->updateQuery($upd_art1);

                          
                        }
                    }
                  } else {
                    $item = array_merge($item,$itemArray);

                          }
                } else {
                  // $_SESSION["cart_item"] = $itemArray;
                  $item2 = $itemArray;
                  foreach($item2 as $key=>$value) {
                  $insertNew = "INSERT INTO `RN$racun` (`RN_ID`, `SIFRA`, `BRFAK`, `BARCODE`, `NAZART`, `JMERE`, `KOLICINA`, `PRODCEN`, `RABAT`, `TARGR`, `PSPOR`, `OPISART`) VALUES (NULL, '".$item2[$key]["SIFRA"]."', '$racun', NULL, '".$item2[$key]["NAZIV"]."', NULL, '".$item2[$key]["KOLICINA"]."', '".$item2[$key]["PRODCEN"]."', NULL, NULL, NULL, NULL)";  
                  $db_handle->insertQuery($insertNew);}
                }
              }
        } 

        ?>