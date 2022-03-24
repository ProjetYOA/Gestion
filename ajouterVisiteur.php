<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repVues = './vues/';
  require("./tools/fonction.php");

 

if (count($_POST)==0)
{
  $etape = 1;
}
else
{ 
  $etape = 2;
   $unMatricule=$_POST["matricule"];
   $unNom=$_POST["nom"];
   $unPrenom=$_POST["prenom"];
   $uneAdresse=$_POST["adresse"];
   $uneVille=$_POST["ville"];
   $unCp=$_POST["cp"];
   $uneDate=$_POST["date"];
   $unSec=$_POST["sec"];
   $unLab=$_POST["code"];
   
ajouterVisiteur($unMatricule,$unNom,$unPrenom,$uneAdresse,$uneVille,$unCp, $uneDate, $unSec,$unLab);
  }

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
// include($repVues ."erreur.php");
include($repVues."vAjouterVisiteur.php") ;
include($repVues."pied.php") ;
?>
  
