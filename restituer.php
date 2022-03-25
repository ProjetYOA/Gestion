<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repVues = './vues/';
  require("./tools/fonction.php");

 



  $etape = 2;
  $prod = listerProduitEmprunter();

include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."vRestituer.php");
include($repVues."pied.php") ;






  ?>