<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require('./tools/fonction.php');

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  
  $ref=$_POST["ref"];
  $id = GETIDProduit($ref);
  //echo $id;
  $supp= supprimerProduit($ref);
  // var_dump($supp);

}

$info=array();
if (isset($_GET['info']))
{
$info = $_GET['info'];
}  
$produit = listerProduit($info);


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;

if ($etape ==1)
{
 include($repVues."vSupprimerProduit.php") ; 
}
else
{
  echo"<br><br>";
 include($repVues."vListerProduits.php") ; 
}
include($repVues."pied.php") ;
?>
  
